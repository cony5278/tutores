<?php

namespace Tutores\Http\Controllers;

use Tutores\EvssaConstantes;
use Tutores\EvssaFunciones;
use Tutores\EvssaTextoMensaje;
use Illuminate\Http\Request;
use Tutores\Http\Requests\PublicacionCuenta;
use Tutores\Area;
use Tutores\Documento;
use Tutores\Paginado;
use Tutores\Tarea;
use Tutores\Publicacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class PublicacionControlador extends Controller
{
    private $publicacion;
    private $tarea;    
    private $documento;

     public function __construct()
    {   

        $this->publicacion=new Publicacion();
        $this->tarea=new Tarea();   
        $this->documento=new Documento();
        //$this->middleware('guest');           
    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return 'paso';
    }
    public function prueba(){
        echo  $this->publicacion->paginar(1,2);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionCuenta $request)
    {

        $this->publicacion->crear($request);
        $publicacion_id=EvssaFunciones::ultimoRegistro($this->publicacion)->id;
        $tareas=$this->tarea->crear($request,$request['area'],$publicacion_id);
        $this->documento->crear($request,$tareas->id,'archivos');
        $vista=view('usuarios.publicacion.fpublicacion')->with(['publicacion'=>$this->publicacion->publicacionUsuarioUltimo(),'publicar'=>false])->render();
        return response()->json(array('success' => true, 'html'=>$vista,'token'=>csrf_token(),'hora_final'=>Carbon::now()->format('Y-m-d')),200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo "EDICION ".$id;
    return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->publicacion->actualizar($request,$id);
        return response()->json(array('success' => true, 'token'=>csrf_token(),'message'=>EvssaTextoMensaje::MENSAJE_EDICION_PUBLICACION_SUCCESS),200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->publicacion->eliminar($id);
        return response()->json(array('success' => true, 'token'=>csrf_token(),'message'=>EvssaTextoMensaje::MENSAJE_ELIMINACION_PUBLICACION_SUCCESS),200);
    }


    public function destroyFile(Request $request,$id){
        $this->publicacion->eliminarArchivos($request, $id);
        return response()->json(array('success' => true, 'token'=>csrf_token(),'message'=>EvssaTextoMensaje::MENSAJE_ELIMINACION_ARCHIVO_PUBLICACION_SUCCESS),200);

    }
    public function addFilePulication(Request $request,$id){

       $this->publicacion->addArchivos($request, $id);
        return response()->json(array('success' => true, 'token'=>csrf_token(),'message'=>EvssaTextoMensaje::MENSAJE_ADD_ARCHIVO_PUBLICACION_SUCCESS),200);


    }
    public function pagePublication(){

        $paginado=Paginado::addPaginado();
        $publicaciones=$this->publicacion->paginar($paginado->inicial,$paginado->final);

        $vista=view('usuarios.publicacion.fpublicacion')->with(['publicaciones'=>$publicaciones,'publicar'=>true,'inicial'=>$paginado->inicial,'final'=>$paginado->final])->render();
        return response()->json(array('success' => true, 'token'=>csrf_token(),'message'=>EvssaTextoMensaje::MENSAJE_ADD_ARCHIVO_PUBLICACION_SUCCESS,'html'=>$vista),200);
    }
}
