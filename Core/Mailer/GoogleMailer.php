<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:49
 */

namespace Core\Mailer;


use Core\Mailer\MessageCompilers\MessageCompiler;

final class GoogleMailer extends Mailer
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
        $this->message = $this->compiler->compile();
        $this->headers = $this->compiler->headers();
    }
    
    public function send()
    {
        mail($this->to, $this->subject, $this->message, implode('\r\n',$this->headers));
    }
}