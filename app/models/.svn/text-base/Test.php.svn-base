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
	
	
}	
?>