<?php	
/*
Model Name: Category Model
*/
class Comment extends ActiveRecord{
	public function __get($key){return $this->property[$key];}
	public function __set($key, $val){return $this->property[$key] = $val;}
	public function __construct($post = '')
	{
		$this->tablename = 'comments';
		$this->property = $post;
		parent::__construct();
	}
}	
?>