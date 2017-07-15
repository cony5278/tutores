<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublicacionCuenta;
use App\Archivos;
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
                'id_usuario'=>Auth::user()->id,
	            'estado'=>$this->seleccionarEstado($request)  ,    
            ]);
    }

    /**
     * todas las publicaciones de un usuario en especifico
     * @return mixed
     */
    public function publicacionUsuarioAll(){
         return $this->where('id_usuario',Auth::user()->id)->orderBy('id','desc')->get();
    }

    /**
     * la ultima publicacion creada por un usuario
     * @return mixed
     */
     public function publicacionUsuarioUltimo(){
         return $this->where('id_usuario',Auth::user()->id)->orderBy('id','desc')->take(1)->first();
    }

    /**
     * metodo que actualiza la informacion de una publicacion
     * @param Request $request
     * @param $id
     */
    public function actualizar(Request $request, $id){
        $publicacion=$this->find($id);
        $publicacion->titulo=$request->titulo;
        $publicacion->descripcion=$request->descripcion;
        $publicacion->tareas->first()->titulo_tarea='mucha cuca'; 
        foreach ($publicacion->tareas->first()->documentos as $documento){
            if($documento->archivo!=$request->input(''.$documento->id.'')){

                $archivo=new Archivos(null);
                $archivoNombre=$documento->archivo;
                $dateServidor=$documento->updated_at;
                $documento->archivo=$request->input(''.$documento->id.'');
                $documento->save();
                $archivo->copiarArchivo($dateServidor,
                                        $documento->updated_at,
                                        $archivoNombre,
                                        $documento->tipo_documento,
                                        $request->input(''.$documento->id.''));


            }
        } 
        $publicacion->tareas->first()->documentos->first()->save();
        $publicacion->tareas->first()->save(); 
        $publicacion->save();
    }

    /**
     * metodo que se utiliza para eliminar una publicacion
     * @param $id
     */
    public function eliminar($id){
        $publicacion=$this->find($id);
        $publicacion->tareas->first()->documentos()->delete();
        $publicacion->tareas->first()->delete();
        $publicacion->delete();

    }
    /**
     * metodo que se utiliza para eliminar una publicacion
     * @param $id
     */
    public function eliminarArchivos(Request $request, $id){
        $publicacion=$this->find($id);
        foreach ($publicacion->tareas->first()->documentos as $documento){
           if(!EvssaFunciones::variableVacio($request->input('eliminar-'.$documento->id.''))){
                $archivo=new Archivos(null);
                $documento->delete();
                $archivo->eliminarArchivo($documento->updated_at,$documento->archivo,$documento->tipo_documento);
           }
        }
    }
    public function addArchivos(Request $request, $id){
        $tarea_id=$this->find($id)->tareas->first()->id;
        $documento=new Documento();
        $documento->crear($request,$tarea_id,'archivos');

    }
    /**
     * obtener las tareas para las publicaciones
    */
    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
}
