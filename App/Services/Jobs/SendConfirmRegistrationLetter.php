<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 05.02.2018
 * Time: 21:35
 */

namespace App\Services\Jobs;

use Core\Mailer\MessageCompilers\HtmlMessageCompiler;
use Core\Mailer\SimpleMailer;

class SendConfirmRegistrationLetter implements JobInterface
{
    private $user;
    private $to;
    private $token;
    private $application;
    private $subject;
    private $link;
    
    public function __construct(array $data)
    {
        $this->user = $data['user'];
        $this->to = $data['email'];
        $this->token = $data['confirm_token'];
        $this->application = getenv('APP');
        $this->subject = 'Please confirm your registration on '.$this->application."!";
        $this->link = getenv('WEB').'/sign-up/email-verifier?token='.$this->token;
    }
    
    public function handle()
    {
         $compiler = new HtmlMessageCompiler(
            'auth.registering',
            [
                'user'=>$this->user,
                'email'=>$this->to,
                'application'=>$this->application,
                'link'=>$this->link
            ]
        );
        $email = new SimpleMailer($compiler);
        $email->to($this->to);
        $email->subject($this->subject);
        $email->send();
    }
}