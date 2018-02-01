<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 01.02.2018
 * Time: 12:09
 */

namespace Core\HTTP;

class ValidatorException extends \Exception {
    public function __construct() {
        http_response_code(406);
    }
}