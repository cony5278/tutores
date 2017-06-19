<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use UsoDeRenderSectionsL5\Http\Requests;
use App\Publicacion;
class CuentaUsuario extends Controller
{
    private $area;    
    private $publicacion;
     public function __construct()
    {          
        $this->area=new Area();  
         $this->publicacion=new Publicacion();       
               
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
         if($request->ajax()){  
            $vista=view('usuarios.publicacion.fpublicacion')->with('publicaciones',$this->publicacion->publicacionUsuarioAll())->render();
            return response()->json(array('success' => true, 'html'=>$vista));
         }else{       
            return view('usuarios.vistacuenta')->with(['areas'=>$this->area->areaAll(),
                                                       'publicaciones'=>$this->publicacion->publicacionUsuarioAll()]);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
