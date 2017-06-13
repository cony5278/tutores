<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Tarea extends Model
{
    protected $table='tareas';
    protected $fillable=['id','titulo_tarea','estado_entrega','area_id'];

  	public function crear(Request $request,$area_id){   

        return  $this->create([         
	            'titulo_tarea'=>$request['titulo_tarea'],
	            'area_id'=>$area_id,
	            'estado_entrega'=> 'ACEPTADO',         
            ]);
    }
     
}
