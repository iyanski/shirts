<?php
//thou shalt not steal my framework. bootstrap area here.
session_start();
error_reporting(E_ALL);
ob_start();

require_once 'config/config.php';
require_once 'internals/functions.php';
require_once 'app/controllers/Application.php';

/*
Initialize Controllers
*/
$controller			= isset($_GET['controller']) ? ucwords($_GET['controller'] . 'Controller') : 'HomeController';
$action				= isset($_GET['action']) ? $_GET['action'] : 'index';
$application		= new $controller;
eval("\$application->$action();");

/*
Start of the Body
*/
function __autoload($classname) {
	global $action;

	$class_name = explode('Controller', $classname);
	
	#loads the internal classes
	if(is_file('internals/' . $classname . '.php'))
		require_once ('internals/' . $classname . '.php');
	#end
	
	#loads a model
	if(is_file('app/models/' . $class_name[0] . '.php'))
		require_once ('app/models/' . $class_name[0] . '.php');
	#end
		
	#loads the controller
	if(is_file('app/controllers/' . strtolower($class_name[0]) . '_controller.php'))
		require_once ('app/controllers/' . strtolower($class_name[0]) . '_controller.php');
	#end

}

#loads the view
$class_name = explode('Controller', $controller);
$class_name[0] = strtolower($class_name[0]);
if(is_file('app/views/' . $class_name[0] . '/' . $action . '.php')){
	#creates local variable for templates
	if(!empty($application->property))
	foreach($application->property as $key => $val){
		if	(is_integer($val))	
			eval('$$key = $val;');
		if	(is_array($val))
			eval('$$key = $val;');
		else{
			$val = addslashes($val);
			eval("$$key = '$val';");
		}
	}
	require_once ('app/views/' . $class_name[0] . '/' . $action . '.php');
}
#end
?>