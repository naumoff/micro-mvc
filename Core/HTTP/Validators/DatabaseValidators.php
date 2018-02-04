<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 21:55
 */
 
namespace Core\HTTP\Validators;


use Core\Model;

trait DatabaseValidators
{
    //check that value is unique in DB
    protected function unique($inputName, $table, $column, $connection = 'default')
    {
        $inputValue = $this->inputs[$inputName];
    
        $sql = "SELECT {$column}
					FROM {$table}
					WHERE {$column} = {$inputValue}";
    
        try{
            $connection = Model::getDB($connection);
            $statement = $connection->prepare($sql);
            $statement->execute();
            $userID = $statement->fetch(\PDO::FETCH_ASSOC);
            var_dump($userID);
            exit();
            if($userID !== FALSE){
                $errorMessage = "User with email <b>{$data['email']}</b> already exists!";
                return $errorMessage;
            }else{
                return false;
            }
        }catch(\PDOException $e){
            echo "We encounter the following problem :". $e->getMessage();
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

        $connection = Model::getDb($connection);
        
        if(strlen($inputValue) < $min){
            $message = "Input for {$inputName} must contain minimum of {$min} symbols!";
            $this->errorsLogger($inputName, $message);
        }
    
        if($inputValue !== $_SESSION['csrf']){
            $this->exceptionMessage = "CSRF token violation!";
        }
    }
}