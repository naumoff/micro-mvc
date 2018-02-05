<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 05.02.2018
 * Time: 23:39
 */

namespace App\Services\Events;


use App\Services\Jobs\RecordNewUserToDB;
use App\Services\Jobs\SendConfirmRegistrationLetter;

class UserRegistration extends EventContainer
{
    public static function handle($data)
    {
        $event = new static();
        $event->attach(new RecordNewUserToDB($data));
        $event->attach(new SendConfirmRegistrationLetter($data));
        $event->fire();
    }
}