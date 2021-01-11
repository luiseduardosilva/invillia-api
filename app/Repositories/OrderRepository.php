<?php


namespace App\Repositories;


use App\Models\Order;
use App\Repositories\Interfaces\IOrderRepository;

class OrderRepository extends Repository implements IOrderRepository
{

    public function all()
    {
        return $this->model->with(['person.phones', 'shiptos','items'])->get();
    }

    public function update(array $array, $id)
    {
        // TODO: Implement update() method.
    }

    public function store($array)
    {
        try {
            if($this->model->find($array['id'])){
                return new \Exception("ID: {$array['id']} já cadastrado");
            }
            return $this->model->create($array);
        } catch (\Exception $e){
            return new \Exception('Erro ao cadastrar Order');
        }
    }

    public function model(): string{
        return Order::class;
    }
}
