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
					WHERE {$column} = '".$inputValue."'";
        try{
            $connection = Model::getDB($connection);
            $statement = $connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);

            if($result !== FALSE){
                $message = "Input for {$inputName} already exists in DB!";
                $this->errorsLogger($inputName, $message);
            }
        }catch(\PDOException $e){
            $this->exceptionMessage = "We encounter the following problem :". $e->getMessage();
        }
    }
}