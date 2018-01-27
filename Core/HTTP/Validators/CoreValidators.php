<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27.01.2018
 * Time: 15:57
 */

namespace Core\HTTP\Validators;


trait CoreValidators
{
    protected function required($inputName)
    {
        echo "required method started for {$inputName} \r\n";
    }
    
    protected function min($inputName, $min)
    {
        echo "Its ok, passed min value {$min} for input name {$inputName}! \r\n" ;
    }
    
    protected function max($inputName, $max)
    {
        echo "it is ok - passed max value {$max} for input name {$inputName}! \r\n";
    }
    
    protected function between($inputName, $min, $max)
    {
        var_dump($min);
        var_dump($max);
        echo "between passed! \r\n";
    }
}