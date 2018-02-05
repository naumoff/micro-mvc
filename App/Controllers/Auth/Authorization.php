<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 20:38
 */

namespace App\Controllers\Auth;

use App\RequestsHandlers\FormValidator;
use App\Services\Events\UserRegistration;
use App\Services\Jobs\SendConfirmRegistrationLetter;
use Core\Controller;
use Core\View;
use App\RequestsHandlers\AjaxValidator;
use App\Models\ModelUser;

class Authorization extends Controller
{
    public function signUpAction()
    {
        View::render('auth.registering');
    }
    
    public function signUpHandlerAction()
    {
        $request = AjaxValidator::create()->validate([
            'name'=>['required', 'minLength:3', 'unique:users,user,default'],
            'mail'=>['required', 'minLength:6', 'unique:users,email,default'],
            'password'=>['required', 'minLength:6'],
            'csrf'=>['csrf']
        ]);

        $data['user'] = $request->inputs['name'];
        $data['email'] = $request->inputs['mail'];
        $data['password'] = password_hash($request->inputs['password'],PASSWORD_DEFAULT);
        $data['confirm_token'] = uniqid();
        
        //saving data to db, sending confirmation request letter
        UserRegistration::handle($data);
    }
    
    public function signUpVerifierAction()
    {
        $request = FormValidator::create();
        if(isset($request->inputs['token'])){
            // check presence in db
        }else{
            // inform about problem
        }
    }
}