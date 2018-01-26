<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 26.01.2018
 * Time: 16:19
 */

namespace Core;


class Validator extends Request {
    
    public $errors;
    
    /**
     * Input example:
     * [
     *    'name'=>['required','min:3', 'string'],
     *    'email'=>['required', 'email']
     * ]
     */
    public function validate(array $inputsAndRules)
    {
        print_r($inputsAndRules);
        // TODO: Implement validate() method.
        foreach ($inputsAndRules AS $input=>$rulesArray){
            //check if user's input exists in the rules array
            $this->checkInputExistence($input);
        }
    }
    
    private function errorLog(array $inputError)
    {
    
    }
    
    private function checkInputExistence($input)
    {
        if(!array_key_exists($input, $this->inputs)){
            echo "{$input} not found";
        }
    }
    
    private function required()
    {
    
    }
}