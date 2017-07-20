<?php

namespace Tutores\Http\Controllers\Auth;

use Tutores\EvssaFunciones;
use Illuminate\Support\Facades\DB;
use Tutores\User;
use Tutores\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/cuenta/usuario';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator= Validator::make($data, [
            'alias' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'tipo_usuario'=>'required',
        ]);
        $usuario=DB::table('users')->where('email', $data['email'])->where('tipo_usuario',$data['tipo_usuario']=='1'?'A':'T')->first();

        if(!EvssaFunciones::objetoVacio($usuario)){
            $validator= Validator::make($data, [
                'email' => 'unique:users',
                'tipo_usuario'=>'unique:users',
            ]);
        }

        return $validator;
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

       $user=new User();
       return $user->crear($data);
    }
}
