<?php

namespace Tutores;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','email','tipo_usuario','alias', 'password'
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

        $usuario=DB::table('users')->where('email', $data['email'])->where('tipo_usuario',$data['tipo_usuario']=='1'?'T':'A')->first();
        return $this->salvar($data,$usuario);

    }
    private function salvar(array $data,$usuario){
        $this->id=EvssaFunciones::objetoVacio($usuario) ? EvssaFunciones::concecutivo($this):EvssaFunciones::cerosIzquierda($usuario->id);
        $this->alias= $data['alias'];
        $this->email= EvssaFunciones::objetoVacio($usuario)? $data['email']:$usuario->email;
        $this->password= bcrypt($data['password']);
        $this->tipo_usuario=$data['tipo_usuario']=='1'?'A':'T';
        $id=$this->id;
        $this->save();
        $this->id=$id;
        $paginado =new Paginado();
        $paginado->crear($this);
        return $this;
    }


    public function paginados(){
        return $this->hasOne('Tutores\Paginado');
    }
 
}
