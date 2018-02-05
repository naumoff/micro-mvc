<?php
/**
 * Home controller
 */

namespace App\Controllers;

use App\RequestsHandlers\AjaxValidator;
use App\RequestsHandlers\FormValidator;
use Core\Mailer\SimpleMailer;
use Core\Mailer\MessageCompilers\HtmlMessageCompiler;
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
        $path = getenv('WEB').'/sign-up/email-verifier?token=53684';
        var_dump($path);
        View::render('home.index');
	}
	
	public function firstFormAction()
    {
        View::render('home.first-form');
    }
    
    public function secondFormAction()
    {
        $data = $this->getFormDataFromSession();
        $this->clearFormDataFromSession();
        View::render('home.second-form', $data);
    }
    #endregion
	
    #region FORM HANDLERS
    // ajax requests
    public function submitFirstFormAction(){
	    
	    AjaxValidator::create()->validate([
            'name'=>['required', 'minLength:3'],
            'mail'=>['required', 'minLength:6'],
            'password'=>['required', 'minLength:6'],
            'csrf'=>['csrf']
        ]);
	    
	    //saving data to db, if validation succeed
        //@todo complete DB recording
    }
    // standard post requests
    public function submitSecondFormAction()
    {
        FormValidator::create()->validate([
            'name'=>['required', 'minLength:3'],
            'mail'=>['required', 'minLength:6'],
            'password'=>['required', 'minLength:6'],
            'csrf'=>['csrf']
        ]);
        
        //saving data to db, if validation succeed
        //@todo complete DB recording
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    #endregion
    
    #region SERVICE METHODS
    private function getFormDataFromSession()
    {
        $data = [];
        if(isset($_SESSION['errors'])){
            $data['errors'] = $_SESSION['errors'];
        }else{
            $data['errors'] = false;
        }
        if(isset($_SESSION['inputs'])){
            $data['inputs'] = $_SESSION['inputs'];
        }else{
            $data['inputs'] = false;
        }
        if(isset($_SESSION['success'])){
            $data['success'] = 'Form submitted successfully!';
        }else{
            $data['success'] = false;
        }
        return $data;
    }
    private function clearFormDataFromSession()
    {
        unset($_SESSION['errors']);
        unset($_SESSION['inputs']);
        unset($_SESSION['success']);
    }
	/**
	 * Before filter.
	 * @return void
	 */
	protected function before(){}
	
	/**
	 * After filter
	 * @return void
	 */
	protected function after(){}
	
	#endregion
}