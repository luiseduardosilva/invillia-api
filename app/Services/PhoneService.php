<?php


namespace App\Services;


use App\Repositories\Interfaces\IPhoneRepository;
use App\Services\Interfaces\IPhoneService;


class PhoneService extends Service implements IPhoneService
{

    protected $repository;

    public function __construct(IPhoneRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($request, $id){}

    public function store($array)
    {

        $arrayP = [];
        if(is_array($array['phones']['phone'])){
            foreach ($array['phones']['phone']  as $phone){
                $arrayP [] = $this->repository->store($this->transform($array['personid'], $phone));
            }
        }

        if(!is_array($array['phones']['phone'])){
            $arrayP [] = $this->repository->store($this->transform($array['personid'], $array['phones']['phone']));
        }

        return $arrayP;
    }

    public function transform($id, $phone){
        return [
            'person_id' => $id,
            'phone'     => $phone,
        ];
    }
}
