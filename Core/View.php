<?php

namespace Core;

use Philo\Blade\Blade;

/**
 * Class View
 * @package Core
 */
class View
{
    #region CLASS PROPERTIES
    private static $csrfToken;
    #endregion
    
    #region MAIN METHODS
	/**
	 * function provides blade template render
	 * @param $view
	 * @param array $data
	 * @return void
	 */
	public static function render($view, $data = [])
	{
	    self::setCSRF();
		$path = dirname(dirname(__File__)).'/App/Views';
		$views = $path;
		$cache = $path.'/cache/';
		
		$blade = new Blade($views, $cache);
		
		$data['csrfInput'] = self::renderFormInputWithCsrfValue();

		echo $blade->view()->make($view,$data)->render();
	}
	
	#endregion
	
	#region SERVICE METHODS
    //setting CSRF value if not setted and passing value to session
    private static function setCSRF()
    {
        if(!isset($_SESSION['csrf'])){
            $_SESSION['csrf'] = uniqid();
        }
        self::$csrfToken = $_SESSION['csrf'];
    }
    
    private static function renderFormInputWithCsrfValue(){
	    return '<input type="text" name="csrf" value="'.self::$csrfToken.'" hidden>';
    }
    #endregion
	
}
