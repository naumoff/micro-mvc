<?php
/**
 * Home controller
 */

namespace App\Controllers;

use App\Validators\MainValidator;
use \Core\View;


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
	    
	    MainValidator::create()->validate([
            'name'=>['required', 'minLength:3'],
            'mail'=>['required', 'minLength:6'],
            'password'=>['required', 'minLength:6']
        ]);
	    
	    //saving data to db, if validation succeed
        //@todo complete DB recording
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