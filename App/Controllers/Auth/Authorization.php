<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 20:38
 */

namespace App\Controllers\Auth;

use Core\Controller;
use Core\View;
use App\RequestsHandlers\AjaxValidator;
use App\Models\ModelUser;

class Authorization extends Controller
{
    public function signUp()
    {
        View::render('auth.registering');
    }
    
    public function signUpHandler()
    {
        $request = AjaxValidator::create()->validate([
            'name'=>['required', 'minLength:3'],
            'mail'=>['required', 'minLength:6'],
            'password'=>['required', 'minLength:6'],
            'csrf'=>['csrf']
        ]);

        $data['user'] = $request->inputs['name'];
        $data['email'] = $request->inputs['mail'];
        $data['password'] = $request->inputs['password'];
        $data['confirm_token'] = 'blablacar';
        
        //saving data to db, if validation succeed
        ModelUser::userRegistration($data);
        
    }
}