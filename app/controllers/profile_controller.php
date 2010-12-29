<?php
class ProfileController extends ApplicationController{

	public function view()
	{
		if(empty($_GET['id'])) page_not_found();
		
		$id = $_GET['id'];
		
		$account = new Account;
		$my_account = $account->find_one_accounts(array(
			':criteria' => array('id' => $id)
			));
		$this->property['account'] = $my_account ? $my_account : array();
		
		//404 page if id is not found
		if(empty($my_account['id'])) page_not_found();
		
		//load the designs of the viewed account
		$design = new Design;
		$designs = $design->find_all_designs(array(
			':criteria' => array('account_id' => $id)
			));
		$this->property['designs'] = $designs;
		
	}
}
?>