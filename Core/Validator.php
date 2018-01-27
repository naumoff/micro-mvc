<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 26.01.2018
 * Time: 16:19
 */

namespace Core;

use Exception;

abstract class Validator extends Request
{
    
    public $errors;
    
    /**
     * Input example:
     * [
     *    'name'=>['required','min:3', 'string'],
     *    'email'=>['required', 'email'],
     *    'attempts'=>['between:1,15', required]
     * ]
     */
    public function validate(array $inputsAndRules)
    {
        print_r($inputsAndRules);
        // TODO: Implement validate() method.
        foreach ($inputsAndRules AS $input=>$rulesArray){
            //check if user's input exists in the rules array
            $this->checkInputExistence($input);
            $this->validateTroughMethods($input, $rulesArray);
        }
    }
    
    private function errorLog(string $input, string $error)
    {
        $this->errors[$input][] = $error;
    }
    
    private function checkInputExistence(string $input)
    {
        if(!array_key_exists($input, $this->inputs)){
            throw new Exception(
                "Input {$input} was not found in Validator ". get_class($this)
            );
        }
    }
    
    private function validateTroughMethods(string $input, array $rules)
    {
        $class_methods = get_class_methods($this);
        
        foreach ($rules AS $rule){
            $rule = explode(':', $rule);
            if(!in_array($rule[0], $class_methods)){
                throw new Exception(
                    "Rule method {$rule[0]} was not found in Validator ". get_class($this)
                );
                //@todo complete logic of adding custom validators
            }else{
                $method = $rule[0];
                $arguments = (isset($rule[1]))? $rule[1] : null;
    
                if($arguments == null){
                    $this->$method($input);
                }else {
                    $arguments = explode(',',$arguments);
                    if(count($arguments)===1){
                        $this->$method($input, $arguments[0]);
                    }elseif (count($arguments)===2){
                        $this->$method($input, $arguments[0],$arguments[1]);
                    }
                    
                }
            }
        }
    }
}