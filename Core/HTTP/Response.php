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
    // late static binding for object creation from classes in App\Validators
    public static function create()
    {
        return new static();
    }
    
    // responce generator
    protected function response() {
        if(count($this->errors)>0){
            http_response_code(406);
            echo json_encode($this->errors);
            exit();
        }else{
            http_response_code(202);
        }
    }
    
}