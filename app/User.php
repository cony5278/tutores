<?php

namespace Tutores;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','email','tipo_usuario','name', 'password'
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

        $this->id=EvssaFunciones::concecutivo($this);
        $this->name= $data['name'];
        $this->email= $data['email'];
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
