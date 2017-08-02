<?php
/**
 * Task Model file
 * @package \App\Models
 */

namespace App\Models;
use Core\Model;
use PDO;


class ModelTask extends \Core\Model {
	
	/**
	 * function that return precise user's task list in array.
	 * or false, if user not authorized.
	 * @param $userID
	 * @return bool | array
	 */
	public static function getUserTaskList($userID)
	{
		if($userID){
			$db = static::getDB();
			$sql = 'SELECT user.user, user.email, task.n, task.task, task.date, task.pictures, task.status
			FROM task
			INNER JOIN user
			ON task.user_id = user.id
			WHERE user.id = :id
			ORDER BY task.n';
			$statement = $db->prepare($sql);
			$statement->bindValue(':id',$userID);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}else{
			return false;
		}
	}
	
	public static function insertNewTask($data)
	{
		if($data['submit'] == 'Save'){
			unset($data['submit']);
			$sql = 'INSERT INTO task
					(n, user_id, task, date, pictures, status)
					VALUES(:n,:user_id,:task,:date,:pictures,:status)';
			$db = Model::getDB();
			$statement = $db->prepare($sql);

		}
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}