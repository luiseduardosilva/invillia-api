<?php


namespace App\Services;


use App\Repositories\Interfaces\IShiptoRepository;
use App\Services\Interfaces\IShiptoService;


class ShiptoService extends Service implements IShiptoService
{

    protected $repository;

    public function __construct(IShiptoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($request, $id){}

    public function store($array)
    {
        $shipto =  $this->transform($array['orderid'], $array['shipto']);
        return $this->repository->store($shipto);
    }
    public function transform($oderId, $shipto){
        return [
            'order_id'  => $oderId,
            'name'      => $shipto['name'],
            'address'   => $shipto['address'],
            'city'      => $shipto['city'],
            'country'   => $shipto['country']
        ];
    }
}
