<?php

class Database{

	private static $instance;
	
	private function __construct()
	{
		global $config;
		mysql_connect($config['HOST'],$config['USER'],$config['PASS']);
		mysql_select_db($config['DB']);
	}
	public static function connect()
	{
		if	(!isset(self::$instance)){
			$c = __CLASS__;
			self::$instance = new $c;			
		}
		return self::$instance;
	}
	
	
	public function __clone()
    {
        trigger_error('Though shalt not clone this connection.', E_USER_ERROR);
    }
	
}
?>