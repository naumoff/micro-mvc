<?php
/**
 * Routing
 */
$router = new Core\Router();

// add routes section $routerObject->addRoute($url,$params)


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