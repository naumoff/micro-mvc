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
    // late static binding for object creation from classes in App\RequestsHandler
    public static function create()
    {
        return new static();
    }
    
    // responce generator
    protected function response() {
        if(count($this->errors)>0){
            $this->errorsHandler();
        }else{
            $this->successHandler();
        }
    }
    
    abstract protected function errorsHandler();
    abstract protected function successHandler();
}