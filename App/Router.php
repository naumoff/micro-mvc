<?php
/**
 * Routing
 */
$router = new Core\Router();

#region AUTHORIZATION
$router->addRoute('sign-up', ['controller'=>'Auth\Authorization', 'action'=>'signUp']);
$router->addRoute('sign-up/handler', ['controller'=>'Auth\Authorization', 'action'=>'signUpHandler']);
$router->addRoute('login');
$router->addRoute('recover');

#endregion

#region FRONT
// add routes section $routerObject->addRoute($url,$params)
$router->addRoute('', ['controller'=>'Home','action'=>'index']);

$router->addRoute('form-one', ['controller'=>'Home','action'=>'firstForm']);
$router->addRoute('form-one/submit', ['controller'=>'Home', 'action'=>'submitFirstForm']);

$router->addRoute('form-two', ['controller'=>'Home','action'=>'secondForm']);
$router->addRoute('form-two/submit', ['controller'=>'Home', 'action'=>'submitSecondForm']);
#endregion

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