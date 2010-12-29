<?php
class CommentsController extends ApplicationController{
	
	public function view()
	{			
		$comment = new Comment;
		$res = $comment->sql("SELECT comments.*, accounts.alias, designs.image, designs.id as design_id FROM comments, accounts, designs WHERE 
			comments.design_id = designs.id AND 
			comments.account_id = accounts.id
			");
		while($row = mysql_fetch_assoc($res)){
			$comments[] = $row;
		}
		#inspect($comments);
		$this->property['comments'] = !empty($comments) ? $comments : false;
	}
	
	public function create()
	{

		//404 if id is not set
		if(empty($_GET['id'])) page_not_found();
		
		global $config;
		$me = whos_logged();
		//load account information
		
		$account = new Account;
		$my_account = $account->find_one_accounts(array(':criteria' => array('user_id' => $me['id'])));
		
		$comment = new Comment;
		$comment->account_id = $my_account['id'];
		$comment->design_id = $_GET['id'];
		$comment->comment = htmlentities(strip_tags(addslashes($_POST['comment'])));
		$comment->created_at = date("Y-m-d h:i:s", time());
		echo $comment->save();
	}
}
?>