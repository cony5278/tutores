<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Publicacion extends Model
{
 protected $table='publicaciones';
    protected $fillable=['id','titulo','descripcion','valor','fecha_inicial','fecha_final','estado','id_usuario'];    
    
    private function seleccionarEstado(Request $request){
    	switch ($request['estado']) {
    		case '1':
    				return 'URGENTE';
    			break;
    		case '2':
    				return 'MUYURGENTE';
    			break;
    		case '3':
    			return 'URGENTE';
    		break;    		
    	}
    	return null;
    }
    public function crear(Request $request){
    	
            return $this->create([         
	            'titulo'=>$request['titulo'],
	            'descripcion'=>$request['descripcion'],
	            'fecha_inicial'=>Carbon::now(),
	            'fecha_final'=>$request['fecha_final'],
	            'valor'=>$request['valor'],
	            'estado'=>$this->seleccionarEstado($request),                
                'id_usuario'=>Auth::user()->id
            ]);
    }
    public function publicacionUsuarioAll(){
         return $this->where('id_usuario',Auth::user()->id)->get();
    }

    /**
     * obtener las tareas para las publicaciones
    */
    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
}
