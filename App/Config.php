<?php
/**
 * configuration class.
 * @package App
 */

namespace App;


class Config {
	/**
	 * DB host
	 * @var string
	 */
	const DB_HOST = 'localhost';
	/**
	 *DB name
	 * @var string
	 */
	const DB_NAME = 'pr_beejee';
	
	/**
	 * DB user
	 * @var string
	 */
	const DB_USER = 'root';
	
	/**
	 * DB pass
	 * @var string
	 */
	const DB_PASS = '';
	
	/**
	 * Development Mode.
	 * If true - more info revealed if error / exception happens.
	 * @var boolean
	 */
	const DEV_MODE = TRUE;
}