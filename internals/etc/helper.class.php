<?php
class helper{
	
	private static $instance;
	private static $helper;

	private function __construct(){}
	
	public static function singleton(){
		if(!isset(self::$instance)){
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}
	
	public static function loads($helper_name){
		if	(is_file('library/helper/'.$helper_name.'.class.php')){
			require_once 'library/helper/'.$helper_name.'.class.php';
			self::$helper = new $helper_name;
		}else{
			throw new Exception	('Helper not found');
		}
		return self::$helper;
	}
	
	public function __clone()
    {
        trigger_error('Though shalt not clone.', E_USER_ERROR);
    }
}
?>