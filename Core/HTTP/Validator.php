<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 26.01.2018
 * Time: 16:19
 */

namespace Core\HTTP;

use Core\HTTP\Validators\CoreValidators;
use Core\HTTP\Validators\DatabaseValidators;

abstract class Validator extends Request {
    // CORE validators and Database validators
    use CoreValidators, DatabaseValidators;
    
    public $errors = [];
    public $exceptionMessage = false;
    
    /**
     * Input example:
     * [
     *    'name'=>['required','min:3', 'string'],
     *    'email'=>['required', 'email'],
     *    'attempts'=>['between:1,15', required]
     * ]
     */
    public function validate(array $inputsAndRules) {
        foreach ($inputsAndRules AS $input => $rulesArray) {
            //check if user's input exists in the rules array
            $this->checkInputExistence($input);
            
            if($this->exceptionMessage === false){
                $this->validateTroughMethods($input, $rulesArray);
            }
            
        }
        $this->response();
        
        return $this;
    }
    
    protected function checkInputExistence(string $input) {
        if (!array_key_exists($input, $this->inputs)) {
            $this->exceptionMessage = "Input {$input} was not found in AjaxValidator " . get_class($this);
        }
    }
    
    protected function validateTroughMethods(string $input, array $rules) {
        $class_methods = get_class_methods($this);
        
        foreach ($rules AS $rule) {
            $rule = explode(':', $rule);
            if (!in_array($rule[0], $class_methods)) {
                $this->exceptionMessage = "Rule method {$rule[0]} was not found in AjaxValidator " . get_class($this);
            } else {
                $method = $rule[0];
                $arguments = (isset($rule[1])) ? $rule[1] : null;
                
                if ($arguments == null) {
                    $this->$method($input);
                }
                else {
                    $arguments = explode(',', $arguments);
                    if (count($arguments) === 1) {
                        $this->$method($input, $arguments[0]);
                    } elseif (count($arguments) === 2) {
                        $this->$method($input, $arguments[0], $arguments[1]);
                    } elseif (count($arguments) === 3) {
                        $this->$method($input, $arguments[0], $arguments[1], $arguments[2]);
                    }
                }
            }
        }
    }
    
    /**
     * Methods recording all validations errors into $this->errors variable
     * @param string $inputName
     * @param string $message
     */
    protected function errorsLogger(string $inputName, string $message) {
        $this->errors[$inputName][] = $message;
    }
    
    abstract protected static function create();
    
    abstract protected function response();
}