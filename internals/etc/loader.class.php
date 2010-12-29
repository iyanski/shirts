<?php

class loader{
	
	private function __construct(){}
	
	public static function loads($clash){
		$clash = explode('-',$clash);
		$classname = $clash[0]; unset($clash[0]);
		$classpath = implode('/',$clash);
		
		if	(is_file($classpath = "library/$classpath/$classname.class.php")){
			include_once $classpath;
			return new $classname;
		} else {
			throw new Exception($classname . ' class could not be found!');
		}
	}

}

?>