<?php
/**
 * Front Controller.
 * Front controller (in public folder)
 * @filesource
 */
session_start();

/**
 * required to load blade template engine
 */
require '../vendor/autoload.php';

/**
 * Autoloader.
 * Function that autoloads files that contains requested Class names
 * @param string $class class name
 * @return void
 */
spl_autoload_register(function($class){
	$root = dirname(__DIR__);
	$file = $root.'/'.str_replace('\\', '/', $class).'.php';
	if(is_readable($file)){
		require $file;
	}
});

/**
 * Errors and exceptions handling set functions
 */
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing file connection.
 */
require('../App/Router.php');

//setting the current $url
$url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);

// uncomment this to see current controller & action
//echo "<pre>";
//print_r($router->getRoutes());
//print_r($router->getParams());