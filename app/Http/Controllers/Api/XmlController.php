<?php

namespace App\Http\Controllers\Api;

use App\Services\Interfaces\IOrderService;
use App\Services\Interfaces\IPersonService;
use App\Services\Interfaces\IXmlService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class XmlController
{
    protected $service;

    protected $personService;

    protected $orderService;

    public function __construct(IXmlService $service, IPersonService $personService, IOrderService $orderService)
    {
        $this->service          = $service;
        $this->personService    = $personService;
        $this->orderService     = $orderService;
    }

    public function store(Request $request)
    {

        $validator = $this->service->validator($request);

        if($validator->fails()){
            return new JsonResponse(['errors' => $validator->errors()], 400);
        }


        $xml = $this->service->xmlToArray($request->file);

        if(isset($xml['person'])){
            $data = $this->personService->store($xml);
        }

        if(isset($xml['shiporder'])){
            $data = $this->orderService->store($xml);
        }

        if(is_array($data) && isset($data)){
            $errors = [];
            foreach($data as $d){
                if($d instanceof \Exception){
                    $errors [] = $d->getMessage();
                }
            }
            if($errors){
                return new JsonResponse(['errors' => $errors], 400);
            }
        }
        return new JsonResponse(['data' => $data, 'message' => "xml salvo"], 200);
    }

}
