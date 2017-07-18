<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paginado extends Model
{
    //
    protected $table='paginados';
    protected $fillable=['id','inicial','final','id_usuario'];

    /**
     * mtodo para crear un registro el la tabla
     * @param $id_usuario
     * @return mixed
     */
    public function crear ($id_usuario){
        return  $this->create([
            'id'=>EvssaFunciones::concecutivo($this),
            'id_usuario'=>$id_usuario,
        ]);
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
