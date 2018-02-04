<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 26.01.2018
 * Time: 16:01
 */

namespace Core\HTTP;


abstract class Request {
    protected $requestType;
    public $inputs;
    
    public function __construct() {
        $this->requestType = $_SERVER['REQUEST_METHOD'];
        
        if($this->requestType === 'POST'){
            $this->inputs = $_POST;
        }elseif ($this->requestType === 'GET'){
            $this->inputs = $_GET;
        }
        
        if(count($this->inputs)>0){
            $this->processInput($this->inputs);
        }
    }
    
    private final function processInput($inputs){
        foreach ($inputs AS $key=>$input){
            $this->inputs[$key] = $this->processString($input);
        }
    }
    
    private final function processString($input)
    {
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    
    abstract protected function validate(array $inputAndRules);
}