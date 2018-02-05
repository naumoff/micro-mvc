<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:49
 */

namespace Core\Mailer;


use Core\Mailer\MessageCompilers\MessageCompiler;

final class SimpleMailer extends Mailer
{
    private $compiler;
    private $message;
    private $headers;
    
    public function __construct(MessageCompiler $compiler)
    {
        $this->compiler = $compiler;
        $this->message();
    }
    
    protected function message()
    {
        $this->message = $this->compiler->compileMessage();
        $this->headers = $this->compiler->formHeaders();
    }
    
    public function send()
    {
        mail($this->to, $this->subject, $this->message, $this->headers);
    }
}