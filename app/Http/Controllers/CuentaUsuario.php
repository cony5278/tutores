<?php

namespace Tutores\Http\Controllers;

use Illuminate\Http\Request;
use Tutores\Area;
use Tutores\Paginado;
use Tutores\Publicacion;
use Tutores\Evssa\EvssaGeneral;
use Tutores\Evssa\EvssaPropertie;

class CuentaUsuario extends Controller implements EvssaGeneral {

	private $area;

	private $publicacion;

	private $idioma;

	public function __construct ( )
	{

		$this -> area = new Area ( );
		$this -> publicacion = new Publicacion ( );
		$this -> middleware ( 'auth' );
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
	public function index (Request $request)
	{

		Paginado :: resetearPaginado ( );
		return view ( 'usuarios.vistacuenta' ) -> with ( 
		[ 
			
				$this -> idioma -> get ( 'TB_15' ) => $this -> area -> areaAll ( ) ,
				$this -> idioma -> get ( 'TB_6' ) => $this -> publicacion -> publicacionUsuarioAll ( ) ,
				$this -> idioma -> get ( 'TB_7' ) => true 
		] );
	
	}

	/**
	 * Show the form for creating a new resource.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function create ( )
	{

	
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * 
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store (Request $request)
	{

	
		//
	}

	/**
	 * Display the specified resource.
	 * 
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ($id)
	{

	
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * 
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ($id)
	{

	
		//
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

	
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * 
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy ($id)
	{

	
		//
	}

}
