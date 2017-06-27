<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Archivos;
class Documento extends Model
{
    protected $table='documentos';

    protected $fillable=['id','archivo','tipo_documento','tarea_id','updated_at'];
   

    public function crear(Request $request,$tarea_id){       
        foreach($request->file('archivos') as $file){
            $archivo=new Archivos($file);
            $this->create([
	        	'archivo'=> $archivo->getNombreSinExtension(),
	            'tarea_id'=>$tarea_id,
	            'tipo_documento'=> $archivo->getExtension(),
                'updated_at'=>$archivo->getCarbon(),
		    ]);
            $archivo->guardarArchivo();
        }
    }
    public function extension($id){
             $documento=$this->find($id);
             $archivos=new Archivos(null);
        return $archivos->cadenaExtension($documento->archivo,$documento->tipo_documento,$documento->updated_at);
    }
     /**
     * Get the post that owns the comment.
     */
    public function tareas()
    {
        return $this->belongsTo('App\Tarea');
    }

}
