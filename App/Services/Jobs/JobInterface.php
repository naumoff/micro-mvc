<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 05.02.2018
 * Time: 16:23
 */

namespace App\Services\Jobs;

interface JobInterface
{
    public function handle();
}