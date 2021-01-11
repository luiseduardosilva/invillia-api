<?php


namespace App\Services;


use App\Repositories\Interfaces\IOrderRepository;
use App\Services\Interfaces\IItemService;
use App\Services\Interfaces\IOrderService;
use App\Services\Interfaces\IShiptoService;


class OrderService extends Service implements IOrderService
{

    protected $repository;

    protected $shiptoService;

    protected $itemService;

    public function __construct(IOrderRepository $repository, IShiptoService $shiptoService, IItemService $itemService)
    {
        $this->repository       = $repository;
        $this->shiptoService    = $shiptoService;
        $this->itemService      = $itemService;
    }

    public function update($request, $id){}

    public function store($array)
    {
        $arrayP = [];
        foreach ($array['shiporder']  as $shiporder){
                $arrayP [] = $this->repository->store($this->transform($shiporder['orderid'], $shiporder['orderperson']));
                $arrayP [] = $this->shiptoService->store($shiporder);
                $arrayP [] = $this->itemService->store($shiporder);
        }
        return $arrayP;
    }

    public function transform($id, $personId){
        return [
            'id'        => $id,
            'person_id' => $personId,
        ];
    }
}
