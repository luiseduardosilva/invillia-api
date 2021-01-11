<?php


namespace App\Repositories;


use App\Models\Shipto;
use App\Repositories\Interfaces\IShiptoRepository;

class ShiptoRepository extends Repository implements IShiptoRepository
{

    public function all()
    {
        return $this->model->with('order.person')->get();
    }

    public function update(array $array, $id)
    {
        // TODO: Implement update() method.
    }

    public function store($array)
    {
        try {
            return $this->model->create($array);
        } catch (\Exception $e){
            return new \Exception('Erro ao cadastrar Shipto');
        }
    }

    public function model(): string{
        return Shipto::class;
    }
}
