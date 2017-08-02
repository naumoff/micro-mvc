<?php
/**
 * Error handler class file.
 */

namespace Core;
use \App\Config;

/**
 * Class Error.
 * @package Core
 */

class Error {
	/**
	 * Error exception handler class. Convert all errors to Exceptions by
	 * throwing an ErrorException object.
	 * @param $errLevel
	 * @param $errMessage
	 * @param $errFile
	 * @param $errLine
	 * @throws \ErrorException
	 */
	public static function errorHandler($errLevel, $errMessage,$errFile,$errLine)
	{
		if(error_reporting()!== 0){
			throw new \ErrorException($errMessage,0,$errLevel,$errFile,$errLine);
		}
	}
	
	/**
	 * Exception handler.
	 * @param Exception $exception The exception
	 * @return void
	 */
	public static function exceptionHandler($exception)
	{
		if(Config::DEV_MODE) {
			echo "<h2>Error occured!</h2>";
			echo "<p>Uncaught exception: " . get_class($exception) . "</p>";
			echo "<p>Message: " . $exception->getMessage() . "</p>";
			echo "<p>Stack trace: <pre>" . $exception->getTraceAsString() . "</pre></p>";
			echo "<p>Thrown in " . $exception->getFile() . " on line " . $exception->getLine() . "</p>";
		}else{
			echo "<h2>Ошибка! Попробуйте перезагрузить страницу.</h2>";
		}

	}
}