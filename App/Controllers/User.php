<?php
/**
 * User Controller
 * @package \App\Controllers
 */

namespace App\Controllers;
use \App\Models\ModelUser;
use \Core\View;

/**
 * Class User
 * @package App\Controllers
 */
class User extends \Core\Controller {
	
	/**
	 * controller reveals new user registration form.
	 * @return void
	 */
	public function registerFormAction() {
		View::render(
			[
				'content'=>'User\registerForm.php',
				'title' => 'Registration',
			]);
	}
	
	/**
	 * user registration function.
	 * method performs new user check with existing database new user
	 * registration if everything is ok
	 * @return void
	 */
	public function registerAction() {
		if ($_POST['send'] == 'register') {
			foreach ($_POST AS $key => $value) {
				$_POST[$key] = \Core\Controller::validate($value);
			}
			
			$formData = TRUE;
			$errorMessage = '';
			if (empty($_POST['user'])) {
				$formData = FALSE;
				$errorMessage = "Username is empty!";
			}
			else {
				if (empty($_POST['pass1']) || empty($_POST['pass2'])) {
					$formData = FALSE;
					$errorMessage = "Password fields cannot be empty!";
				}
				else {
					if ($_POST['pass1'] !== $_POST['pass2']) {
						$formData = FALSE;
						$errorMessage = "Passwords must be identical";
					}
					else {
						if (empty($_POST['email'])) {
							$formData = FALSE;
							$errorMessage = "Email field cannot be blank!";
						}
					}
				}
			}
		}
		else {
			$formData = FALSE;
			$errorMessage = 'Unknown mistake!';
		}
		
		if ($formData === FALSE) {
			View::render(
				[
					'content'=>'User/registerForm.php',
					'title' => "Registration",
					'user' => $_POST['user'],
					'email' => $_POST['email'],
					'errorMessage' => $errorMessage
				]);
		}
		else {
			if ($formData === TRUE) {
				$data =
					[
						'user' => $_POST['user'],
						'email' => $_POST['email'],
						'pass' => md5($_POST['pass1'])
					];
				$errorMessage = ModelUser::checkUserName($data);
				$errorMessage .= ModelUser::checkUserEmail($data);
				
				if (!empty($errorMessage)) {
					View::render(
						[
							'content'=>'User/registerForm.php',
							'title' => "Registration",
							'user' => $_POST['user'],
							'email' => $_POST['email'],
							'errorMessage' => $errorMessage
						]);
				}
				else {
					$userAddStatus = ModelUser::userRegistration($data);
					if ($userAddStatus === TRUE) {
						header("Location: /user/login-form");
					}
					else {
						View::render(
							[
								'content'=>'User/registerForm.php',
								'title' => "Registration",
								'user' => $_POST['user'],
								'email' => $_POST['email'],
								'errorMessage' => 'User was not registered because of unknown reasons!'
							]);
					}
				}
			}
		}
	}
	
	/**
	 * Login Form exhibition
	 * @return void
	 */
	public function loginFormAction() {
		View::render(
			[
				'content'=>'User/loginForm.php',
				'title' => "login"
			]);
	}
	
	/**
	 * login function.
	 * function performs user login and writes to session user id and name
	 * @todo finish wrong authentication procedure
	 * @return void
	 */
	public function loginAction()
	{
		if (isset($_POST['auth']) && $_POST['auth'] == 'login') {
			foreach ($_POST AS $key => $value) {
				if ($key == 'pass') {
					$_POST[$key] = md5(\Core\Controller::validate($value));
				} else {
					$_POST[$key] = \Core\Controller::validate($value);
				}
			}
			$result = \App\Models\ModelUser::userLogin($_POST);
			if($result === TRUE){
				View::render(
					[
						'content'=>'User/successPage.php',
						'title'=>'Success',
						'user'=>$_SESSION['userName']
					]);
			}else{
				/**
				 * require completion
				 */
			}
		}else{
			header("location: /user/login-form");
		}
	}
	
	/**
	 * function clear log session and ModelUser static vars (userID and userName).
	 * And then redirects to Home page.
	 * @return void
	 */
	public function logOutAction()
	{
		unset($_SESSION['userID']);
		unset($_SESSION['userName']);
		\App\Models\ModelUser::$userID = FALSE;
		\App\Models\ModelUser::$userName = FALSE;
		header("location: /");
	}
}