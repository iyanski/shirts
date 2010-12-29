<?php
	function inspect($arr){
		echo '<pre>';
		var_dump($arr);
		echo '</pre>';
	}
	
	function is_logged(){
		if	(Session::show_if_logged())
			return 1;
		return 0;
	}
	
	function whos_logged(){
		global $config;
		if	(!empty($_SESSION[$config['APPLICATION_NAME']]))
			return array('id'=>$_SESSION[$config['APPLICATION_NAME']]['id']);
		return 0;
	}
		
	function log_me_out(){
		Session::destroy();
	}
	
	function require_this($type,$cladget){
		switch($type){
			case ':cladget':
			require_once "cladgets/$cladget.php";
			break;
		}
	}
	
	function does_exists($item){
		if(empty($item)) header('Location: 404.php');
	}
	
	function page_not_found()
	{
		global $config;
		header("Location: {$config['SITE_URL']}404.php");
	}
	
	function must_log_in(){
		global $config;
		header("Location: {$config['SITE_URL']}user/login/");
	}
	
	function redirect_to($address)
	{
		global $config;
		header("Location: {$config['SITE_URL']}{$address}");
	}
	
	function clean($item){
		return isset($item) ? $item : '';
	}
?>