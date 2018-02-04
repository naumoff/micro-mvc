<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:51
 */

namespace Core\Mailer\MessageCompilers;


abstract class MessageCompiler
{
   
    public function formHeaders()
    {
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: Andrey Naumoff <andrey.naumoff@gmail.com>' . "\r\n";
        return $headers;
    }
    abstract public function compileMessage();
}