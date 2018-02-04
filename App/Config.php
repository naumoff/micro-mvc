<?php
/**
 * configuration class.
 * @package App
 */

namespace App;


class Config {
	/**
	 * APP Name
	 * @var string
	 */
	const APP_NAME = 'MVC Framework';
	/**
	 * DB host
	 * @var string
	 */
    
    const DB_CONNECTION = [
        'mysqlConn'=>[
            'driver'=>'mysql',
            'credentials'=>[
                'host'=>'localhost',
                'db'=>'pb_mvc',
                'user'=>'root',
                'password'=>''
            ]
        ],
        'default'=>[
            'driver'=>'sqlite',
            'credentials'=>[
                'path'=>'../Database/sqlite.db'
            ]
        ]
    ];
	
	/**
	 * Development Mode.
	 * If true - more info revealed if error / exception happens.
	 * @var boolean
	 */
	const DEV_MODE = TRUE;
}