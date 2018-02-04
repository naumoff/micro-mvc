<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:52
 */

namespace Core\Mailer\MessageCompilers;


class TextMessageCompiler extends MessageCompiler
{
    private $message;
    private $params;
    
    public function __construct(string $message, array $params)
    {
        $this->message = $message;
        $this->params = $params;
    }
    
    public function compileMessage()
    {
        return  $this->message;
    }
}