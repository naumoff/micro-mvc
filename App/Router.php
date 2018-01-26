<?php
/**
 * Routing
 */
$router = new Core\Router();

// add routes section $routerObject->addRoute($url,$params)
$router->addRoute('', ['controller'=>'Home','action'=>'index']);
$router->addRoute('form-one', ['controller'=>'Home','action'=>'firstForm']);
$router->addRoute('form-two', ['controller'=>'Home','action'=>'secondForm']);
$router->addRoute('form-three', ['controller'=>'Home','action'=>'thirdForm']);

/*
	// precise patterns
	$router->addRoute('', ['controller'=>'Home','action'=>'index']);
	$router->addRoute('test/rest',['controller'=>'Test','action'=>'rest']);
	
	// web route patters
	$router->addRoute('{controller}/{action}');
	$router->addRoute('{controller}/{id:\d+}/{action}');
	
	// admin route patterns
	$router->addRoute('admin/{controller}/{action}',['namespace'=>'Admin']);
*/