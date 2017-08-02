<?php

namespace App\Controllers;

use Core\Controller;
use Core\View;

class Test extends Controller{
	
	public function restAction()
	{
		$view = 'Test.content';
		$data = 777;
		View::render($view, compact('data'));
	}
	
	public function before()
	{
//		return false;
	}
	
	public function after()
	{
	
	}
}