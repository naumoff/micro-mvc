<?php
/**
 * Base view file
 */

namespace Core;

/**
 * Central Class View.
 * Provides function to render html files
 * @package Core
 */

class View {
	
	public static $standardFolder = 'Layouts';
	
	public static $viewRoot;
	
	public static $header = '\header.php';
	
	public static $topmenu = '\topmenu.php';
	
	public static $footer = '\footer.php';
	
	public static $content;
	
	/**
	 * @TODO add possibility do not load navbar (for Tasks needed)
	 * @param $params
	 */
	public static function render($params)
	{
		if(array_key_exists('folder',$params)) {
			self::$viewRoot = dirname(__DIR__).'\App\Views\\'.$params['folder'];
		}else{
			self::$viewRoot = dirname(__DIR__).'\App\Views\\'.self::$standardFolder;
		}
		
		if(array_key_exists('content', $params)){
			self::$content = dirname(__DIR__).'\App\Views\\'.$params['content'];
			if(is_readable(self::$content)){
				$data['content'] = self::$content;
			}
		}
		
		if(is_dir(self::$viewRoot)){
			// header.php defining
			if(is_readable(self::$viewRoot.self::$header)){
				$data['header'] = self::$viewRoot.self::$header;
			}
			
			//topmenu.php defining
			if(is_readable(self::$viewRoot.self::$topmenu)){
				$data['topmenu'] = self::$viewRoot.self::$topmenu;
			}
			
			//footer.php defining
			if(is_readable(self::$viewRoot.self::$footer)){
				$data['footer'] = self::$viewRoot.self::$footer;
			}
			
			unset($params['folder']);
			unset($params['content']);
			if(!empty($params) && is_array($params)){
				foreach ($params AS $key=>$value){
					$data[$key]=$value;
				}
			}
			extract($data,EXTR_SKIP);
//			echo "<pre>";
//			print_r($data);
//			echo "</pre>";
			require self::$viewRoot.'\master.php';
			
		}else{
			exit("Main view folder path failed!");
		}
	}
}