<?php


namespace App\Services;


use App\Repositories\Interfaces\IItemRepository;
use App\Services\Interfaces\IItemService;
use App\Services\Interfaces\IShiptoService;


class ItemService extends Service implements IItemService
{

    protected $repository;


    public function __construct(IItemRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($request, $id){}

    public function store($array)
    {

        $orderId = $array['orderid'];
        $arrayItems = [];

        foreach ($array['items']  as $item){
            if( !isset( $item['title'] ) ){
                foreach ($item as $i){
                    $arrayItems [] = $this->repository->store($this->transform($orderId, $i));
                }
            }
            if( isset( $item['title'] ) ){
                $arrayItems [] = $this->repository->store($this->transform($orderId, $item));
            }
        }
        return $arrayItems;
    }


    public function transform($orderId, $item){
        return [
            'order_id'  => $orderId,
            'title'     => $item['title'],
            'note'      => $item['note'],
            'quantity'  => $item['quantity'],
            'price'     => $item['price'],
        ];
    }
}
