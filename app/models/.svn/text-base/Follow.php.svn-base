<?php	
/*
Model Name: Category Model
*/
class Follow extends ActiveRecord{
	public function __get($key){return $this->property[$key];}
	public function __set($key, $val){return $this->property[$key] = $val;}
	public function __construct($post = '')
	{
		$this->tablename = 'follows';
		$this->property = $post;
		parent::__construct();
	}
	
	
	public function count_followed($account_id)
	{	
		$follow = new Follow;
		$follows = $follow->sql("SELECT id FROM follows WHERE following = {$account_id}");
		return !empty($follows) ? mysql_num_rows($follows) : 0;
	}
	
	public function count_followers($account_id)
	{
		$follow = new Follow;
		$follows = $follow->sql("SELECT id FROM follows WHERE account_id = {$account_id}");
		return !empty($follows) ? mysql_num_rows($follows) : 0;
	}
}	
?>