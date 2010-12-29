<?php

if ($file_handle = opendir('config/')){

	while(false !== ($file = readdir($file_handle))){
		if(preg_match('/(.*)\.(php)/', $file)){
			if(($file != 'index.php') && ($file != 'config.php')){
				require_once $file;
				}
		}
	}

}

?>