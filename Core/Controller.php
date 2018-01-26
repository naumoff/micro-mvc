<?php
/**
 * Base Controller file
 */

namespace Core;

use Core\Validator;

/**
 * Class Controller
 * @package Core
 */

abstract class Controller
{
	/**
	 * Parameters from the matched routes
	 * @var array
	 */
	protected $route_params = [];
	
	/**
	 * Controller constructor.
	 * @param array $route_params Parameters from the route
	 * @return void
	 */
	public function __construct($route_params = null)
	{
		$this->route_params = $route_params;
//		echo "<pre>";
//		print_r($route_params);
	}
	
	/**
	 * Magic method called when a non-existent or inaccessible method is
	 * called on an object of this class. Used to execute before and after
	 * filter methods on action methods. Action methods need to be named
	 * with an "Action" suffix, e.g. indexAction, showAction etc.
	 *
	 * @param string $name Method name
	 * @param array $arguments arguments passed to method
	 * @return void
	 */
	public function __call($name, $arguments)
	{
		$method = $name.'Action';
		if(method_exists($this, $method)){
			if($this->before() !== FALSE){
				call_user_func_array([$this,$method], $arguments);
				$this->after();
			}
		}else{
//			echo "Method {$method} not found in controller ".get_class($this);
			throw new \Exception("Method {$method} not found in controller ". get_class($this));
		}
	}
    
    /**
     * function returns instance of Validator with multiple methods to validate user's input
     * @return \Core\Validator
     */
	protected function validator(){
        $validator = new Validator();
        return $validator;
    }
	
	/**
	 * Before filter - called before an action method.
	 * Need to be modified in each child controller
	 * If it returns false in child controller, method will not run
	 * @return void
	 */
	protected function before()
	{
	}
	
	/**
	 * After filter - called after an action method.
	 * Need to be modified in each child controller
	 * @return void
	 */
	protected function after()
	{
	}
}