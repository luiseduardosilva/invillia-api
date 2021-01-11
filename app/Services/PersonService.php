<?php


namespace App\Services;


use App\Repositories\Interfaces\IPersonRepository;
use App\Services\Interfaces\IPersonService;
use App\Services\Interfaces\IPhoneService;


class PersonService extends Service implements IPersonService
{

    protected $repository;
    protected $phoneService;

    public function __construct(IPersonRepository $repository, IPhoneService $phoneService)
    {
        $this->repository = $repository;
        $this->phoneService = $phoneService;
    }

    public function update($request, $id){}

    public function store($request)
    {
        $arrayP = [];
        foreach ($request['person'] as $person){
            $arrayP [] = $this->repository->store($this->transform($person));
            if($person['phones']){
                $arrayP [] = $this->phoneService->store($person);
            }
        }
        return $arrayP;
    }

    public function transform($person){
        return [
            'id'   => $person['personid'],
            'name' => $person['personname'],
        ];
    }
}
