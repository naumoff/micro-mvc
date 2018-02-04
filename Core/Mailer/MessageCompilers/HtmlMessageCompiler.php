<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 04.02.2018
 * Time: 14:53
 */

namespace Core\Mailer\MessageCompilers;

use Philo\Blade\Blade;

class HtmlMessageCompiler extends MessageCompiler
{
    private $viewName;
    private $params;
    
    public function __construct(string $viewName, array $params)
    {
        $this->viewName = $viewName;
        $this->params = $params;
    }
    
    public function compileMessage()
    {
        $path = dirname(__File__, 4).'/App/Views/';
        $views = $path.'/mails/';
        $cache = $path.'/cache/';

        $blade = new Blade($views, $cache);
        
        return  $blade->view()->make($this->viewName,$this->params)->render();
    }

}