<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:51
 */

namespace Core\Mailer\MessageCompilers;


interface MessageCompiler {
    public function compile();
    public function headers();
}