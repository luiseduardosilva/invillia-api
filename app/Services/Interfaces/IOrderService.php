<?php


namespace App\Services\Interfaces;

interface IOrderService extends IService
{
    public function store($request);
}
