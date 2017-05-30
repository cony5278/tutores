<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	 protected $table="usuarios";
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
        'contrasena', 'remember_token',
    ];
    public function todos(){
       return $this->get(); 
    }
}
