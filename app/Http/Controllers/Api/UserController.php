<?php

namespace App\Http\Controllers\Api;

use App\Services\Interfaces\IUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class UserController extends BaseController
{
    protected $service;

    public function __construct(IUserService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $user = $this->service->store($request);

        if($user instanceof MessageBag){
            return new JsonResponse(['errors' => $user], 400);
        }

        return response()->json(['data' => $user], 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function login(Request $request): JsonResponse{
        $user = $this->service->login($request);

        if($user instanceof MessageBag){
            return new JsonResponse(['errors' => $user], 200);
        }

        if($user instanceof \Exception){
            return new JsonResponse(['errors' => $user->getMessage()], 200);
        }

        return response()->json(["user" => $user['user'], "token" => $user['token']], 200);

    }
}
