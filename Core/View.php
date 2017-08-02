<?php

namespace Core;

use Philo\Blade\Blade;

/**
 * Class View
 * @package Core
 */
class View
{
	/**
	 * function provides blade template render
	 * @param $view
	 * @param array $data
	 * @return void
	 */
	public static function render($view, $data = [])
	{
		$path = dirname(dirname(__File__)).'/App/Views';
		$views = $path;
		$cache = $path.'/cache/';
		
		$blade = new Blade($views, $cache);

		echo $blade->view()->make($view,$data)->render();
	}
	
}
