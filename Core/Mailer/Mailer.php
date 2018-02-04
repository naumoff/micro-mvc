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
    
    public function to($to)
    {
        $this->to = $to;
    }
    
    public function subject($subject)
    {
        $this->subject = $subject;
    }
    
    abstract protected function message();
    abstract protected function send();
}