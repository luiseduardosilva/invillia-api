<?php


namespace App\Repositories;


use App\Models\Person;
use App\Repositories\Interfaces\IPersonRepository;

class PersonRepository extends Repository implements IPersonRepository
{

    public function all()
    {
        return $this->model->with('phones')->get();
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
            return new \Exception('Erro ao cadastrar dados');
        }
    }

    public function model(): string{
        return Person::class;
    }
}
