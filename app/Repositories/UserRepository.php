<?php


namespace App\Repositories;


use App\User;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository extends Repository implements IUserRepository
{
    public function update(array $array, $id)
    {
        // TODO: Implement update() method.
    }

    public function store($array)
    {
        try {
            return $this->model->create($array);
        } catch (\Exception $e){
            return new \Exception('Erro ao cadastrar User');
        }
    }

    public function findEmail($email) {
        try {
            return $this->model->where('email', '=', $email)->first();
        } catch (\Exception $e){
            return new \Exception('Erro ao consultar User');
        }
    }

    public function model(): string{
        return User::class;
    }
}
