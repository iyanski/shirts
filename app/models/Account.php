<?php	
/*
Model Name: Category Model
*/
class Account extends ActiveRecord{
	public function __get($key){return $this->property[$key];}
	public function __set($key, $val){return $this->property[$key] = $val;}
	public function __construct($post = '')
	{
		$this->tablename = 'accounts';
		$this->property = $post;
		parent::__construct();
	}
	
	public function get_id($user_id){
		$account = new Account;
		$user = $account->find_one_accounts(array(
			':criteria' => array('user_id' => $user_id)
		));
		return $user ? $user['id'] : false;
	}
}	
?>