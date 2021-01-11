<?php


namespace App\Repositories;


use App\Models\Person;
use App\Models\Phone;
use App\Repositories\Interfaces\IPhoneRepository;

class PhoneRepository extends Repository implements IPhoneRepository
{

    public function all()
    {
        return $this->model->with('person')->get();
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
            return new \Exception('Erro ao cadastrar Telefone');
        }
    }

    public function model(): string{
        return Phone::class;
    }
}
