<?php
/**
 * Task Controller file
 * @package \App\Controllers
 */

namespace App\Controllers;
use \App\Models\ModelTask;
use \App\Models\ModelUser;
use Core\Controller;
use \Core\View;



class Task extends \Core\Controller{
	
	private $userID;
	private $userName;
	private $userEmail;
	
	/**
	 * Task constructor.
	 */
	public function __construct() {
		$this->userID = ModelUser::getUserID();;
		$this->userName = ModelUser::getUserName();
		$this->userEmail = ModelUser::getUserEmail();
	}
	
	/**
	 * function reveals to do list for current user
	 * @return void
	 */
	public function listAction()
	{
		$data = ModelTask::getUserTaskList($this->userID);
		View::render(
			[
				'content'=>'Task/index.php',
				'title'=> 'My tasks',
				'datas' => $data
			]);
	}
	
	public function addFormAction()
	{
		View::render(
			[
				'content'=>'Task/taskForm.php',
				'title'=>'Add Task'
			]);
	}
	
	public function addTaskAction()
	{
		if (!empty($_POST['submit']) && $_POST['submit'] == 'Save') {
			foreach ($_POST AS $key=>$value){
				$_POST[$key] = Controller::validate($value);
			}
			$_POST[':userID'] = $this->userID;
			$_POST[':userName'] = $this->userName;
			$_POST[':userEmail'] = $this->userEmail;
			$submitStatus = ModelTask::insertNewTask($_POST);
		}
	}
}