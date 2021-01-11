<?php


namespace App\Repositories;


use App\Models\Item;
use App\Repositories\Interfaces\IItemRepository;

class ItemRepository extends Repository implements IItemRepository
{
    public function all(){
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
            return new \Exception('Erro ao cadastrar Item');
        }
    }

    public function model(): string{
        return Item::class;
    }
}
