<?php
class FeedController extends ApplicationController{

	public function view()
	{
		if(is_logged()){
			global $config;
			$me = whos_logged();
			
			//load account information
			$account = new Account;
			$my_account = $account->find_one_accounts(array(
				':criteria' => array('user_id' => $me['id'])
				));
				
			//search all followed people
			$friend = new Follow;
			$following = $friend->find_all_follows(array(
				":criteria" => array("account_id" => $my_account['id'])
				));
			
			//generate a string of ids
			if(!empty($following)) foreach($following as $ids){
				$friends[] = $ids['following'];
			}
			$follows = $my_account['id'];
			
			if(!empty($following)){
				unset($following);
				$follows .= "," . join(",", $friends);
			}
			//fetch designs of the people you follow
			$feed = new Design;
			$res = $feed->sql("SELECT designs.*, accounts.alias, accounts.id as account_id FROM designs, accounts WHERE designs.account_id IN({$follows}) AND accounts.id = designs.account_id ORDER BY created_at DESC LIMIT 0,10");
		}else{
			$feed = new Design;
			$res = $feed->sql("SELECT designs.*, accounts.alias, accounts.id as account_id FROM designs, accounts WHERE accounts.id = designs.account_id ORDER BY created_at DESC LIMIT 0,10");
		}
		
		//extract sql resource to sabotable array
		while($rows = mysql_fetch_assoc($res)){
		  $feeds[] = $rows;
		}
		//cast to view
		$this->property['designs'] = !empty($feeds) ? $feeds : false;
	}
}
?>