<?php


namespace App\Services;


use App\Repositories\Interfaces\IUserRepository;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Auth;


class UserService extends Service implements IUserService
{

    protected $repository;


    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update($request, $id){}

    public function store($request)
    {
        $validator = $this->validator($request);

        if($validator->fails()){
            return $validator->errors();
        }

        $user = $request->only(['name', 'email', 'password']);
        $user['password'] = bcrypt($user['password']);
        return $this->repository->store($user);

    }

    public function login($request){


        $validator = $this->validatorLogin($request);

        if($validator->fails()){
            return $validator->errors();
        }
        $credentials = $request->only(['email', 'password']);


        if(!Auth::attempt($credentials)) {

            return new \Exception('Error ao efetuar login');
        }

        $user  = $this->repository->findEmail($request->only(['email']));

        $token = $user->createToken('token')->accessToken;

        return ["user" => $user, "token" => $token];
    }

    public function validator($request){
        return \Validator::make($request->all(),[
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password'=> 'required|min:5|confirmed|max:20',
            'password_confirmation'=> 'required|min:5|max:20',
        ],
        [
            'required' => ':attribute é obrigatorio',
            'email' => ':attribute não é validdo',
            'min' => ':attribute requerer no minimo :min caracteres',
            'max' => ':attribute requerer no maximo :max caracteres',
            'confirmed' => 'Senha não é válida',
            'unique' => ':attribute já está em uso',
        ]);
    }


    public function validatorLogin($request){
        return \Validator::make($request->all(),[
            'email' => 'required|email|max:50|exists:users,email',
            'password'=> 'required|',
        ],
        [
            'required' => ':attribute é obrigatorio',
            'email' => ':attribute não é validdo',
            'min' => ':attribute requerer no minimo :min caracteres',
            'max' => ':attribute requerer no maximo :max caracteres',
            'exists' => ':attribute não é valido!'
        ]);
    }
}
