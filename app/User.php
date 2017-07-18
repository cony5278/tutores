<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function crear(array $data){
        $usuario= $this->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'tipo_usuario'=>$data['tipo_usuario']=='1'?'A':'T',
        ]);
        $paginado=new Paginado();
        $paginado->crear($usuario->id);
        return $usuario;
    }

    public function paginados(){
        return $this->hasOne('App\Paginado');
    }
 
}
