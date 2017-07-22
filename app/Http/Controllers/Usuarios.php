<?php

namespace Tutores\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tutores\Http\Requests\UsuarioRequest;
use Tutores\User;

class Usuarios extends Controller {

	private $suario;

	public function __construct ( )
	{

		$this -> usuario = new User ( );
		$this -> middleware ( 'guest' );
	
	}

	/**
	 * Display a listing of the resource.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function index ( )
	{

		return view ( "/usuario/sesion" );
	
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
	public function store (UsuarioRequest $request)
	{

		$this -> usuario -> crear ( $request );
	
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

	public function autenticacion (Request $request)
	{

		if ( Auth :: attempt ( 
		[ 
			'email' => $email , 'password' => $password 
		] ) )
		{
			// Authentication passed...
			return redirect ( ) -> intended ( 'cuenta/usuario' );
		}
	
	}

}
