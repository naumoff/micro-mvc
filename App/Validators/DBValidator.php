<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27.01.2018
 * Time: 17:19
 */

namespace App\Validators;

use Core\HTTP\Response;

/**
 * Class DBValidator can contain user-defined validators
 * @package App\Validators
 */
final class DBValidator extends Response
{
    /*
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
*/
}