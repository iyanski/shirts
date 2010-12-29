<?php
class AccountController extends ApplicationController{

	public function __construct(){
		$this->is_a_restricted_area();
	}

	public function home()
	{
		global $config;
		$me = whos_logged();
		
		//load account information
		$account = new Account;
		$my_account = $account->find_one_accounts(array(
			':criteria' => array('user_id' => $me['id'])
			));
			
		//create account if does not exist yet
		if(!($my_account)){
			$account = new Account(array('user_id' => $me['id'], 'created_at' => date("Y-m-d h:i:s"), 'updated_at' => date("Y-m-d h:i:s")));
			$account->save();
		}
		
		//update changes
		if(!empty($_POST['submit'])){
			$save_account = new Account($_POST['account']);
			$save_account->update(array(
				':criteria' => array('user_id' => $me['id'])
			));
			
		}
		
		$follower = new Follow;
		$followers = $follower->count_followers($my_account['id']);
		$following = $follower->count_followed($my_account['id']);
		$this->property['followers'] = !empty($followers) ? $followers : false;
		$this->property['following'] = !empty($following) ? $following : false;
		
		//reload account information
		$my_account = $account->find_one_accounts(array(
			':criteria' => array('user_id' => $me['id'])
			));
			
		$design = new Design;
		$designs = $design->find_all_designs(array(
			':criteria' => array('account_id' => $my_account['id'])
			));
		$this->property['designs'] = $designs;
			
		//save uploaded file
		if(!empty($_FILES['image'])){
			$imageproperty = getimagesize($_FILES['image']['tmp_name']);
			if($imageproperty[0] <= 48 && $imageproperty[1] <= 48){
				if(move_uploaded_file($_FILES['image']['tmp_name'], $config['AVATAR'].$my_account['user_id'].'.jpg')){
					$this->property['response'] = "Avatar updated successfully.";
				}else{
					$this->property['response'] = "There's a problem uploading your avatar!";
				}
			}else{
				$this->property['response'] = "Image's dimension must be 48 x 48!";
			}
		}
		
		$this->property['account'] = $my_account ? $my_account : array();
	}
	
	public function view()
	{
		global $config;
		$me = whos_logged();
		$account = new Account;
		$this->property['my_account'] = $account->find_one_accounts(array(
			':criteria' => array('id' => $me['id'])
			));
	}
	
	public function create()
	{
		global $config;
		$me = whos_logged();
		$account = new Account(array('id' => $me['id']));
		$account->save();
	}
	
	public function modify_design()
	{
		if(empty($_GET['id'])) page_not_found();
		
		$design = new Design;
		$shirt_design = $design->find_one_designs(array(
			':criteria' => array('id' => $_GET['id'])
		));	
		
		//if shirt not found in catalog
		if(empty($shirt_design)) page_not_found();	
		
		$this->property['shirt'] = !empty($shirt_design) ? $shirt_design : false;
	}
	
	public function submit()
	{
		global $config;
		$me = whos_logged();
		
		//load account information
		$account = new Account;
		$my_account = $account->find_one_accounts(array(
			':criteria' => array('user_id' => $me['id'])
			));
			
		if(!empty($_POST['submit'])){		
			$account = new Design($_POST['design']);
			$account->account_id = $my_account['id'];
			$account->created_at = date("Y-m-d h:i:s a");
			$account->updated_at = date("Y-m-d h:i:s a");
			$account->image = (!empty($_FILES['image'])) ? 						md5('image'.time()).'.jpg' : '';
			$account->image_large = (!empty($_FILES['image_large'])) ? 			md5('image_large'.time()).'.jpg' : '';
			$account->image_placement = (!empty($_FILES['image_placement'])) ? 	md5('image_placement'.time()).'.jpg' : '';
			$account->save();
			
			
			//upload thumbnail version
			if(!empty($_FILES['image'])){
				$imageproperty = getimagesize($_FILES['image']['tmp_name']);
				if($imageproperty[0] <= 500 && $imageproperty[1] <= 400){
					if(move_uploaded_file($_FILES['image']['tmp_name'], $config['DESIGN'].$account->image)){
						$this->property['response_for_thumbnail'] = "Thumbnail updated successfully.";
					}else{
						$this->property['response_for_thumbnail'] = "There's a problem uploading your thumbnail.";
					}
				}else{
					$this->property['response_for_thumbnail'] = "Image's dimension must be 500 x 400!";
				}
			}
			
			//upload large version
			if(!empty($_FILES['image_large'])){
			unset($imageproperty);
				$imageproperty = getimagesize($_FILES['image_large']['tmp_name']);
				if($imageproperty[0] <= 800 && $imageproperty[1] <= 600){
					if(move_uploaded_file($_FILES['image_large']['tmp_name'], $config['DESIGN'].$account->image_large)){
						$this->property['response_for_large'] = "Large Version updated successfully.";
					}else{
						$this->property['response_for_large'] = "There's a problem uploading your large version image.";
					}
				}else{
					$this->property['response_for_large'] = "Image's dimension must be 800 x 600!";
				}
			}
			
			//upload placement version
			if(!empty($_FILES['image_placement'])){
			unset($imageproperty);
				$imageproperty = getimagesize($_FILES['image_placement']['tmp_name']);
				if($imageproperty[0] <= 500 && $imageproperty[1] <= 400){
					if(move_uploaded_file($_FILES['image_placement']['tmp_name'], $config['DESIGN'].$account->image_placement)){
						$this->property['response_for_placement'] = "Placement version updated successfully.";
					}else{
						$this->property['response_for_placement'] = "There's a problem uploading your placement version.";
					}
				}else{
					$this->property['response_for_placement'] = "Image's dimension must be 500 x 400!";
				}
			}
		}
	}
	
	public function update()
	{
		$account = new Account;
		$account->update();
	}
}
?>