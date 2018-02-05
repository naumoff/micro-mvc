<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 05.02.2018
 * Time: 23:28
 */

namespace App\Services\Events;


use App\Services\Jobs\JobInterface;

abstract class EventContainer
{
    protected $jobs = [];
    
    public function attach(JobInterface $job)
    {
        $this->jobs[] = $job;
        return $this;
    }
    
    public function fire()
    {
        foreach ($this->jobs AS $job){
            $job->handle();
        }
    }
    
    public function detach($index)
    {
        unset($this->jobs[$index]);
    }
    
    abstract public static function handle(array $data);
}