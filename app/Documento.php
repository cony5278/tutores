<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Documento extends Model
{
    protected $table='documentos';
    protected $fillable=['id','archivo','tipo_documento','tarea_id'];
    public function getRuta($archivo){ 
    		$carbon=Carbon::now();
    		$nombre=$carbon->format('H-i-s').$archivo->getClientOriginalName();
   		return $nombre;
   		
    }
    public Function crearDirectorio(){
    		if(!is_dir(public_path('archivos').'/'.Auth::user()->tipo_usuario.Auth::user()->email)){
				mkdir(public_path('archivos').'/'.Auth::user()->tipo_usuario.Auth::user()->email, 0777);			
    		}
    }
    public Function guardarArchivo($archivo,$nombre){    	
			\Storage::disk('local')->put('/'.Auth::user()->tipo_usuario.Auth::user()->email.'/'.$nombre,\File::get($archivo));		
    }

    public function crear(Request $request,$tarea_id){    		     
       		$nombre=$this->getRuta($request->file('archivo'));
       		$this->crearDirectorio();
       		$this->guardarArchivo($request->file('archivo'),$nombre);	  
   
     		$this->create([         
	        	'archivo'=>$nombre,
	            'tarea_id'=>$tarea_id,
	            'tipo_documento'=> 'PDF',         
		    ]);
    }

}
