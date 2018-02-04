<?php
/**
 * Base Model Class File
 */

namespace Core;

use PDO;
use \App\Config;

/**
 * Class Model
 * @package Core
 */
class Model extends DBConnections
{
    /**
     * function provides PDO connection to database.
     * @return object of PDO
     */
	public static function getDB($connectionName = 'default')
    {
        if(isset(parent::$connections[$connectionName]) && parent::$connections[$connectionName] instanceof PDO){
            return parent::$connections[$connectionName];
        }else{
            $driver = Config::DB_CONNECTION[$connectionName]['driver'];
            $credentials = Config::DB_CONNECTION[$connectionName]['credentials'];
            return parent::$driver($connectionName, $credentials);
        }
    }
}