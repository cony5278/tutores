<?php

namespace Tutores;


use Tutores\Http\Requests\UsuarioRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User  as Authenticatable;
class Usuario extends Authenticatable
{
   use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudonimo', 'correo', 'contrasena',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contrsena', 'remember_token',
    ];
    public function crear(UsuarioRequest $request){

        $usuario= $this->create([
            'pseudonimo'=>$request['pseudonimo'],
            'correo'=>$request['correo'],
            'contrasena'=> bcrypt($request['contrasena']),
            'tipo_usuario'=>$request['usuario']=='1'?'A':'T',
            ]);
        $paginado=new Paginado();
        $paginado->crear($usuario->id);
    }
}
