<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:53
 */

namespace Core\Mailer\MessageCompilers;

use Philo\Blade\Blade;

class HtmlMessageCompiler implements MessageCompiler
{
    private $viewName;
    private $params;
    
    public function __construct($viewName, $params)
    {
        $this->viewName = $viewName;
        $this->params = $params;
    }
    
    public function compile() {
    
        $path = dirname(dirname(__File__)).'/App/Views/';
        $views = $path.'/mails/';
        $cache = $path.'/cache/';
    
        $blade = new Blade($views, $cache);
    
        return $blade->view()->make($this->viewName,$this->params)->render();
    }
    
    public function headers()
    {
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: Andrey Naumoff <andrey.naumoff@gmail.com>';
        return $headers;
    }
}