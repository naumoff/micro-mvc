<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27.01.2018
 * Time: 15:58
 */

namespace Core\HTTP;


abstract class Response extends Validator
{
    // late static binding for object creation from classes in App\RequestsHandlers
    public static function create()
    {
        return new static();
    }
    
    // responce generator
    protected function response() {
        if($this->exceptionMessage !== false){
            $this->exceptionHandler();
            return;
        }
        
        if(count($this->errors)>0){
            $this->errorsHandler();
            return;
        }
        
        $this->successHandler();
        
    }
    
    abstract protected function exceptionHandler();
    abstract protected function errorsHandler();
    abstract protected function successHandler();
}