<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Tarea extends Model
{
    protected $table='tareas';
    protected $fillable=['id','titulo_tarea','estado_entrega','area_id','publicacion_id'];

  	public function crear(Request $request,$area_id,$publicacion_id){   

        return  $this->create([         
	            'titulo_tarea'=>$request['titulo_tarea'],
	            'area_id'=>$area_id,
	            'publicacion_id'=>EvssaFunciones::cerosIzquierda($publicacion_id),
	            'estado_entrega'=> 'ACEPTADO',         
            ]);
    }
     /**
     * Get the comments for the blog post.
     */
    public function documentos()
    {
        return $this->hasMany('App\Documento');
    }
      /**
     * Get the post that owns the comment.
     */
    public function publicaciones()
    {
        return $this->belongsTo('App\publicaciones');
    }
}
