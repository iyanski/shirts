<?php	
/*
Model Name: Category Model
*/
class User extends ActiveRecord{
	public function __get($key){return $this->property[$key];}
	public function __set($key, $val){return $this->property[$key] = $val;}
	public function __construct($post = '')
	{
		$this->tablename = 'users';
		$this->property = $post;
		parent::__construct();
	}
	
	public function login($access){
		$user = new User();
		$authorized = $user->find_one_users(array(
			':criteria' => array('login' => $access['login'], 'password' => md5($access['password']))
			));
		$this->property['authorized'] = $authorized ? $authorized : false ;
		return ($authorized) ? true : false ;
	}
	
	public function exists($account)
	{
		$user = new User;
		$exists = $user->find_one_users(array(
			':criteria' => array('login' => $account['login'])
			));
		return ($exists) ? true : false;
	}
	
	public function unique($account)
	{
		$user = new User;
		$unique = $user->find_one_users(array(
			':criteria' => array('login' => $account['login'])
			));
		return ($unique) ? false : true;
	}
}	
?>