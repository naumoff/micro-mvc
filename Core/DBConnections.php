<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 11:16
 */

namespace Core;

use PDO;

abstract class DBConnections
{
    protected static $connections;
    
    /**
     * function provides PDO connection to MYSQL DB based on
     * provided connection name and credentials.
     * @return object of PDO
     */
    protected static function mysql(string $connectionName, array $credentials)
    {
        static::$connections[$connectionName] = new PDO(
            "mysql:host=".$credentials['host'].";dbname=".$credentials['db'].";charset=utf8",
            $credentials['user'],
            $credentials['password'],
            [PDO::ATTR_PERSISTENT => true]
        );
        static::$connections[$connectionName]
            ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return static::$connections[$connectionName];
    }
    
    protected static function sqlite(string $connectionName, array $credentials)
    {
        static::$connections[$connectionName] = new PDO("sqlite:" . $credentials['path']);
        static::$connections[$connectionName]
            ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return static::$connections[$connectionName];
    }
    
    /**
     * @param string $connection
     * @return mixed
     */
    abstract protected static function getDb(string $connectionName);
}