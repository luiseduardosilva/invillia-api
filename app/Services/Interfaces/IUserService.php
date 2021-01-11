<?php


namespace App\Services\Interfaces;

interface IUserService extends IService
{
    public function login($request);
}
