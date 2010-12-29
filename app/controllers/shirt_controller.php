<?php
class ShirtController extends ApplicationController{

	public function view()
	{
		
		if(empty($_GET['id'])) page_not_found();
		
		$shirt = new Shirt;
		$shirt = $shirt->find_one_shirts(array(
			':criteria' => array('id' => $_GET['id'])
		));
		
		if(empty($shirt)) page_not_found();
		
		$account = new Account;
		$account = $account->find_one_accounts(array(
			':criteria' => array('user_id' => $shirt['account_id'])
			));

		$this->property['account'] = $account ? $account : array();
		
	}
}
?>