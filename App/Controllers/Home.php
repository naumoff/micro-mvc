<?php
/**
 * Home controller
 */

namespace App\Controllers;

use App\Controllers\Helpers\MainValidator;
use \Core\View;


/**
 * Class Home
 * @package App\Controllers
 */

class Home extends \Core\Controller
{
    //attaches method validate() to get instance on core validator
    use MainValidator;
    
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
	        'name'=>['between:10,15', 'required'],
            'mail'=>['required', 'max:10'],
            'password'=>['required', 'min:3']
        ]);
//        http_response_code(404);
//        echo "problems";
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