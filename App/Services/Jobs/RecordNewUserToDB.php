<?php
/**
 * Created by PhpStorm.
 * User: andre
 * Date: 05.02.2018
 * Time: 23:21
 */

namespace App\Services\Jobs;


use App\Models\ModelUser;

class RecordNewUserToDB implements JobInterface
{
    private $data;
    
    public function __construct(array $data)
    {
        $this->data = $data;
    }
    
    public function handle()
    {
        ModelUser::userRegistration($this->data);
    }
}