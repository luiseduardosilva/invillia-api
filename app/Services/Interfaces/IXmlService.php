<?php


namespace App\Services\Interfaces;


interface IXmlService extends IService
{

    public function validator($request);

    public function xmlToArray($xml);
}
