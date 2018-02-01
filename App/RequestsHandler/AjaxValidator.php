<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 26.01.2018
 * Time: 19:30
 */

namespace App\RequestsHandler;

use Core\HTTP;

/**
 * Class AjaxValidator can contain user-defined validators
 * @package App\RequestsHandler
 */
final class AjaxValidator extends HTTP\Response
{
    #region SERVICE METHODS
    protected function exceptionHandler() {
        http_response_code(406);
        echo json_encode($this->exceptionMessage);
        exit();
    }
    
    protected function errorsHandler() {
        http_response_code(406);
        echo json_encode($this->errors);
        exit();
    }
    
    protected function successHandler() {
        http_response_code(202);
    }
    #enregion
    
    #region CUSTOM VALIDATORS METHODS
    
    /*
        //check condition that passed number value is between defined range
        protected function between($inputName, $min, $max)
        {
            $inputValue = $this->inputs[$inputName];
            if(!is_numeric($inputValue)){
                $message = "Value for {$inputName} must be numeric!";
                $this->errorsLogger($inputName, $message);
            }else{
                if($inputValue > $max || $inputValue < $min){
                    $message = "Value of {$inputName} must be within {$min} - {$max} range!";
                    $this->errorsLogger($inputName, $message);
                }
            }
        }
    */
    
    #endregion
}