<?php
/**
 * Home controller
 */

namespace App\Controllers;

use \App\Helpers;
use \Core\View;
use Core\Validator;

/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
	#region Properties
    #endregion
	
	public function __construct($route_params = NULL) {
		parent::__construct($route_params);
	}
	
	#region Main Methods
	public function indexAction()
    {
        View::render('home.index',[]);
	}
	
	public function firstFormAction()
    {
        View::render('home.first-form');
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
	
    #region AJAX METHODS
    public function submitFirstFormAction(){
	    $this->validator()->validate([
	        'name'=>['required'],
            'mail'=>['required'],
            'password'=>['required']
        ]);
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