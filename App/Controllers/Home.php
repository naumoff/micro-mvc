<?php
/**
 * Home controller
 */

namespace App\Controllers;
use \App\Models\ModelUser;
use \Core\View;

/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
	/**
	 * Show index page for Home controller.
	 * @return void
	 */
	public function indexAction(){
		if(\App\Models\ModelUser::getUserID() == FALSE){
			$auth = FALSE;

			View::render(
				[
					'content' => 'Home/index.php',
					'title' => 'Главная',
					'auth'=>$auth
				]);
		}else{
			$auth = TRUE;
			$userName = \App\Models\ModelUser::getUserName();
			View::render(
				[
					'content'=>'Home/index.php',
					'title'=>'Главная',
					'auth'=>$auth,
					'userName'=>$userName
				]);
		}

	}
	
	/**
	 * Before filter.
	 * @return void
	 */
	protected function before()
	{

	}
	
	/**
	 * After filter
	 * @return void
	 */
	protected function after()
	{

	}
}