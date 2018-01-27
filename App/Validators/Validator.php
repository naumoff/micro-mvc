<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 26.01.2018
 * Time: 19:30
 */

namespace App\Validators;

use Core\Validator AS CoreValidator;


class Validator extends CoreValidator {
    
    private function required($inputName)
    {
        echo "required method started for {$inputName} \r\n";
    }
    
    private function min($inputName, $min)
    {
        echo "Its ok, passed min value {$min} for input name {$inputName}! \r\n" ;
    }
    
    private function max($inputName, $max)
    {
        echo "it is ok - passed max value {$max} for input name {$inputName}! \r\n";
    }
    
    private function between($inputName, $min, $max)
    {
        var_dump($min);
        var_dump($max);
        echo "between passed! \r\n";
    }
}