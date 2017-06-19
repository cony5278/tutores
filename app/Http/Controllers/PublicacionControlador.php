<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Documento;
use App\Tarea;
use App\Publicacion;
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
        //
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
        $publicacion=$this->publicacion->crear($request);   
        $tareas=$this->tarea->crear($request,$request['area'],$publicacion->id); 
        $this->documento->crear($request,$tareas->id);         
        return $request->all();       
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
