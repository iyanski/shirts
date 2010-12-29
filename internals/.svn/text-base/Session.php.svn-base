<?php
class Session extends ApplicationBase{
	
	public function show_if_logged(){
		global $config;
		if(!(empty($_SESSION[$config['APPLICATION_NAME']])))
			return 1;
		return 0;
	}
	
	public function create($account)
	{
		global $config;
		$_SESSION[$config['APPLICATION_NAME']] = $account;
	}
	
	public function destroy(){
		global $config;
		unset($_SESSION[$config['APPLICATION_NAME']]);
	}

}
?>