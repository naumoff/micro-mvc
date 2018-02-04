<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:10
 */

namespace Core\Mailer;


abstract class Mailer
{
    protected $to;
    protected $subject;
    
    protected function to($to)
    {
        $this->to = $to;
    }
    
    protected function subject($subject)
    {
        $this->subject = $subject;
    }
    
    abstract protected function message();
    abstract protected function send();
}