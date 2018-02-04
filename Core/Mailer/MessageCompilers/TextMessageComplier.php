<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:52
 */

namespace Core\Mailer\MessageCompilers;


class TextMessageComplier implements MessageCompiler
{
    private $message;
    
    private function __construct(string $text)
    {
        $this->message = $text;
    }
    
    public function compile() {
        return $this->message;
    }
    
    public function headers() {
        // TODO: Implement headers() method.
    }
}