<?php
/**
 * Home controller
 */

namespace App\Controllers;

use \App\Helpers;
use \Core\View;

/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
	use Helpers\ProcessInput;
	
	#region Properties
    #endregion
	
	public function __construct($route_params = NULL) {
		parent::__construct($route_params);
	}
	
	#region Main Methods
	/**
	 * Show index page for Home controller.
	 * @return void
	 */
	public function indexAction()
    {
        View::render('home.index',[]);
	}
	
	public function firstFormAction()
    {
        View::render('home.first-form');
    }
    
    public function submitFirstFormAction(){
	    echo "<pre>";
	    print_r($_POST);
    }
    
    public function firstFormPost()
    {
    
    }
    
    public function secondFormAction()
    {
        View::render('home.second-form');
    }
    
    public function thirdFormAction()
    {
        View::render('home.third-form');
    }
	#endregion
	
    #region SERVICE METHODS
	/**
	 * Before filter.
	 * @return void
	 */
	protected function before() {}
	
	/**
	 * After filter
	 * @return void
	 */
	protected function after(){}
	
	#endregion
}