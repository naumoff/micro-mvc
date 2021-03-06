<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27.01.2018
 * Time: 17:19
 */

namespace App\RequestsHandlers;

use Core\HTTP\Response;

/**
 * Class FormValidator can contain user-defined validators
 * @package App\RequestsHandlers
 */
final class FormValidator extends Response
{
    #region SERVICE METHODS
    protected function exceptionHandler() {
        throw new \Exception(
            $this->exceptionMessage
        );
    }
    
    protected function errorsHandler() {
        $_SESSION['errors']=$this->errors;
        $_SESSION['inputs']=$this->inputs;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    protected function successHandler() {
        http_response_code(202);
        $_SESSION['success']=true;
    }
    #enregion
    
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
}