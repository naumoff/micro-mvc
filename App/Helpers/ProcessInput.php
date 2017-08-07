<?php

namespace App\Helpers;

 trait ProcessInput
 {
 	protected function processString($input)
    {
	    $input = trim($input);
	    $input = stripcslashes($input);
	    $input = htmlspecialchars($input);
    	return $input;
    }
 }