<?php

namespace Tutores\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tutores\Documento;
use Tutores\EvssaFunciones;
use Tutores\Paginado;
use Tutores\Publicacion;
use Tutores\Tarea;
use Tutores\Evssa\EvssaGeneral;
use Tutores\Evssa\EvssaPropertie;
use Tutores\Http\Requests\PublicacionCuenta;

class PublicacionControlador extends Controller implements EvssaGeneral {

	private $publicacion;

	private $tarea;

	private $documento;

	private $idioma;

	public function __construct ( )
	{

		$this -> publicacion = new Publicacion ( );
		$this -> tarea = new Tarea ( );
		$this -> documento = new Documento ( );
		$this -> init ( );
	
	}

	public function init ( )
	{

		$this -> idioma = new EvssaPropertie ( );
	
	}

	/**
	 * Display a listing of the resource.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function index ( )
	{

		return 'paso';
	
	}

	public function prueba ( )
	{

		echo $this -> idioma -> get ( 'TB_1' );
	
	}

	/**
	 * Show the form for creating a new resource.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function create ( )
	{

	
	}

	/**
	 * Store a newly created resource in storage.
	 * 
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store (PublicacionCuenta $request)
	{

		$this -> publicacion -> crear ( $request );
		$publicacion_id = EvssaFunciones :: ultimoRegistro ( 
		$this -> publicacion ) -> id;
		$tareas = $this -> tarea -> crear ( $request,
		$request [ $this -> idioma -> get ( 'TB_12' ) ], $publicacion_id );
		$this -> documento -> crear ( $request, $tareas -> id,
		$this -> idioma -> get ( 'TB-13' ) );
		$vista = view ( 'usuarios.publicacion.fpublicacion' ) -> with ( 
		[ 
			
				$this -> idioma -> get ( 'TB_14' ) => $this -> publicacion -> publicacionUsuarioUltimo ( ) ,
				$this -> idioma -> get ( 'TB_7' ) => false 
		] ) 
			-> render ( );
		return response ( ) -> json ( 
		array( 
			
				$this -> idioma -> get ( 'TB_1' ) => true ,
				$this -> idioma -> get ( 'TB_4' ) => $vista ,
				$this -> idioma -> get ( 'TB_2' ) => csrf_token ( ) ,
				$this -> idioma -> get ( 'TB_11' ) => Carbon :: now ( ) -> format ( 
				'Y-m-d' ) 
		), 200 );
	
	}

	/**
	 * Display the specified resource.
	 * 
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ($id)
	{

		return redirect ( ) -> route ( 'login' );
	
	}

	/**
	 * Show the form for editing the specified resource.
	 * 
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ($id)
	{

	
	}

	public function validacionAct (array $data)
	{

		return Validator :: make ( $data,
		[ 
			$this -> idioma -> get ( 'TB_10' ) => 'required' 
		] );
	
	}

	/**
	 * Update the specified resource in storage.
	 * 
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update (Request $request , $id)
	{

		$this -> validacionAct ( $request -> all ( ) ) 
			-> validate ( );
		$this -> publicacion -> actualizar ( $request, $id );
		return response ( ) -> json ( 
		array( 
			
				$this -> idioma -> get ( 'TB_1' ) => true ,
				$this -> idioma -> get ( 'TB_2' ) => csrf_token ( ) ,
				$this -> idioma -> get ( 'TB_3' ) => $this -> idioma -> get ( 
				'TB_35' ) 
		), 200 );
	
	}

	/**
	 * Remove the specified resource from storage.
	 * 
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ($id)
	{

		$this -> publicacion -> eliminar ( $id );
		return response ( ) -> json ( 
		array( 
			
				$this -> idioma -> get ( 'TB_1' ) => true ,
				$this -> idioma -> get ( 'TB_2' ) => csrf_token ( ) ,
				$this -> idioma -> get ( 'TB_3' ) => $this -> idioma -> get ( 
				' TB_36' ) 
		), 200 );
	
	}

	public function destroyFile (Request $request , $id)
	{

		$this -> publicacion -> eliminarArchivos ( $request, $id );
		return response ( ) -> json ( 
		array( 
			
				$this -> idioma -> get ( 'TB_1' ) => true ,
				$this -> idioma -> get ( 'TB_2' ) => csrf_token ( ) ,
				$this -> idioma -> get ( 'TB_3' ) => $this -> idioma -> get ( 
				'TB_37' ) 
		), 200 );
	
	}

	public function addFilePulication (Request $request , $id)
	{

		$this -> publicacion -> addArchivos ( $request, $id );
		return response ( ) -> json ( 
		array( 
			
				$this -> idioma -> get ( 'TB_1' ) => true ,
				$this -> idioma -> get ( 'TB_2' ) => csrf_token ( ) ,
				$this -> idioma -> get ( 'TB_3' ) => $this -> idioma -> get ( 
				'TB_38' ) 
		), 200 );
	
	}

	public function pagePublication ( )
	{

		$paginado = Paginado :: addPaginado ( );
		$publicaciones = $this -> publicacion -> paginar ( 
		$paginado -> inicial, $paginado -> final );
		$vista = view ( 'usuarios.publicacion.fpublicacion' ) -> with ( 
		[ 
			
				$this -> idioma -> get ( 'TB_6' ) => $publicaciones ,
				$this -> idioma -> get ( 'TB_7' ) => true ,
				$this -> idioma -> get ( 'TB_8' ) => $paginado -> inicial ,
				$this -> idioma -> get ( 'TB_9' ) => $paginado -> final 
		] ) 
			-> render ( );
		return response ( ) -> json ( 
		array( 
			
				$this -> idioma -> get ( 'TB_1' ) => true ,
				$this -> idioma -> get ( 'TB_2' ) => csrf_token ( ) ,
				$this -> idioma -> get ( 'TB_3' ) => $this -> idioma -> get ( 
				'TB_38' ) ,
				$this -> idioma -> get ( 'TB_4' ) => $vista 
		), 200 );
	
	}

}
