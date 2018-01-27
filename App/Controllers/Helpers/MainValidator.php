<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 27.01.2018
 * Time: 16:23
 */

namespace App\Controllers\Helpers;

use App\Validators;

trait MainValidator {
    
    /**
     * function returns instance of MainValidator with multiple methods to validate user's input
     * @return \Core\MainValidator
     */
    protected function validator()
    {
        $validator = new Validators\MainValidator();
        return $validator;
    }
}