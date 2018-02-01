<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27.01.2018
 * Time: 15:57
 */

namespace Core\HTTP\Validators;

use Core\HTTP\ValidatorException;

trait CoreValidators
{
    
    #region CORE VALIDATORS
    
    //check csrf token
    protected function csrf($inputName)
    {
        $inputValue = $this->inputs[$inputName];
        if($inputValue !== $_SESSION['csrf']){
            throw new ValidatorException(
                "CSRF token violation!"
            );
        }
    }
    
    //check user inputs and if nothing passed - returns error
    protected function required($inputName)
    {
        $inputValue = $this->inputs[$inputName];
        
        if($inputValue === null || $inputValue === ''){
            $message = "Value for {$inputName} is required!";
            $this->errorsLogger($inputName, $message);
        }
    }
    
    //check minimum number value condition
    protected function minNumber($inputName, $min)
    {
        $inputValue = $this->inputs[$inputName];
        if(!is_numeric($inputValue)){
            $message = "Value for {$inputName} must be numeric!";
            $this->errorsLogger($inputName, $message);
        }else{
            if($inputValue < $min){
                $message = "Value of {$inputName} must be equal or more then {$min}!";
                $this->errorsLogger($inputName, $message);
            }
        }
    }
    
    //check maximum number value condition
    protected function maxNumber($inputName, $max)
    {
        $inputValue = $this->inputs[$inputName];
        if(!is_numeric($inputValue)){
            $message = "Value for {$inputName} must be numeric!";
            $this->errorsLogger($inputName, $message);
        }else{
            if($inputValue > $max){
                $message = "Value of {$inputName} must be equal or less then {$max}!";
                $this->errorsLogger($inputName, $message);
            }
        }
    }
    
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
    
    //check if string length exceeds minimum required length
    protected function minLength($inputName, $min)
    {
        $inputValue = $this->inputs[$inputName];
        if(strlen($inputValue) < $min){
            $message = "Input for {$inputName} must contain minimum of {$min} symbols!";
            $this->errorsLogger($inputName, $message);
        }
    }
    
    //check if string length does not exceeds maximum length
    protected function maxLength($inputName, $max)
    {
        $inputValue = $this->inputs[$inputName];
        if(strlen($inputValue) > $max){
            $message = "Input for {$inputName} must contain maximum of {$max} symbols!";
            $this->errorsLogger($inputName, $message);
        }
    }
    #endregion
}