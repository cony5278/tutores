<?php

namespace Tutores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Paginado extends Model
{
    //
    protected $table='paginados';
    protected $fillable=['id','inicial','final','id_usuario','email','tipo_usuario'];

    /**
     * mtodo para crear un registro el la tabla
     * @param $id_usuario
     * @return mixed
     */
    public function crear ($usuario){

        return  $this->create([
            'id'=>EvssaFunciones::concecutivo($this),
            'id_usuario'=>EvssaFunciones::cerosIzquierda($usuario->id),
            'email'=>$usuario->email,
            'tipo_usuario'=>$usuario->tipo_usuario,
        ]);
    }




    public function users()
    {
        return $this->belongsTo('Tutores\User');
    }
    public static function resetearPaginado(){
        $paginado=Auth::user()->paginados()->first();
        $paginado->inicial=0;
        $paginado->final=9;
        $paginado->save();
    }
    public static function addPaginado(){
        $paginado=Auth::user()->paginados()->first();
        $paginado->inicial=$paginado->inicial+9;
        $paginado->final=$paginado->final+9;
        $paginado->save();
        return $paginado;
    }

}
