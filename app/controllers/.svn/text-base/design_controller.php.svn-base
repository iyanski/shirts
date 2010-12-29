<?php
class DesignController extends ApplicationController{

	public function view()
	{
		//404 if tee is blank
		if(empty($_GET['id'])) page_not_found();
		
		//load design of the tee
		$design = new Design;
		$tee = $design->find_one_designs(array(':criteria' => array('id' => $_GET['id'])));
		$this->property['tee'] = $tee;
		
		//404 if tee is not located
		if(empty($tee)) page_not_found();
		
		//load account information
		$account = new Account;
		$my_account = $account->find_one_accounts(array(':criteria' => array('id' => $tee['account_id'])));		
		$this->property['account'] = $my_account ? $my_account : array();
		
		
		//load comments
		$comment = new Comment;
		$res = $comment->sql("SELECT comments.*, accounts.alias, accounts.id as account_id FROM accounts, comments WHERE comments.account_id = accounts.id AND comments.design_id = {$_GET['id']}");
		while($row = mysql_fetch_assoc($res)){$comments[] = $row;}
		$this->property['comments'] = !empty($comments) ? $comments : array();		
	}
}
?>