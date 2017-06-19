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

    protected $fillable=['id','archivo','tipo_documento','tarea_id'];
   

    public function crear(Request $request,$tarea_id){       
        foreach($request->file('archivos') as $file){ 
    		$archivo=new Archivos($file); 
    		$archivo->guardarArchivo();	     
     		$this->create([         
	        	'archivo'=>$archivo->getNombre(),
	            'tarea_id'=>$tarea_id,
	            'tipo_documento'=> 'PDF',         
		    ]);
        }
    }
    public function extension($nombreArchivo){
            $archivos=new Archivos(null); 
        return $archivos->cadenaExtension($nombreArchivo);
    }
     /**
     * Get the post that owns the comment.
     */
    public function tareas()
    {
        return $this->belongsTo('App\Tarea');
    }

}
