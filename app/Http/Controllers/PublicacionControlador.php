<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PublicacionCuenta;
use App\Area;
use App\Documento;
use App\Tarea;
use App\Publicacion;
use Carbon\Carbon;
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
        \Storage::copy('/juan.rodriguezdia@uptc.edu.co/A/img/01-27-13Hydrangeas.jpg', '/juan.rodriguezdia@uptc.edu.co/A/img/porro.jpg');
        return 'paso';
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
       
        $publicacion=$this->publicacion->crear($request);   
        $tareas=$this->tarea->crear($request,$request['area'],$publicacion->id); 
        $this->documento->crear($request,$tareas->id); 
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
       return  redirect()->action('CuentaUsuario@index');
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
       return  redirect()->action('CuentaUsuario@index');
    }
}
