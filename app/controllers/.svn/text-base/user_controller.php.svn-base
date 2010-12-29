<?php
class UserController extends ApplicationController{

	public function index()
	{

	}
	
	public function login()
	{
		if(!empty($_POST['user'])){
			$user = new User($_POST['user']);
			if($user->login($_POST['user'])){
				Session::create($user->authorized);
				redirect_to("account/home/");
			}
		}
	}
	
	public function logout()
	{
		Session::destroy();
		redirect_to("home/index/");
	}
	
	public function signup(){
		if(!empty($_POST['user'])){
			if($_POST['user']['password'] == $_POST['confirm_password']){
				$user = new User($_POST['user']);
				if($user->unique($_POST['user'])){
					$user->password = md5($user->password);
					$user->save();
					$this->property['successfull'] = true;
					//Mailer::send('template', $args);
				}else{
					$this->property['errors'] = array(
						'Username is already taken.'
					);
				}
			}
		}
	}
}
?>