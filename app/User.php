<?php

namespace Tutores;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Tutores\Evssa\EvssaGeneral;
use Tutores\Evssa\EvssaPropertie;

class User extends Authenticatable implements EvssaGeneral {

	private $idioma;

	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	 */
	protected $fillable = [ 
		'id' , 'email' , 'tipo_usuario' , 'alias' , 'password' 
	];

	/**
	 * The attributes that should be hidden for arrays.
	 * 
	 * @var array
	 */
	protected $hidden = [ 
		'password' , 'remember_token' 
	];

	public function __construct ( )
	{

		$this -> init ( );
	
	}

	public function init ( )
	{

		$this -> idioma = new EvssaPropertie ( );
	
	}

	public function crear (array $data)
	{

		$usuario = DB :: table ( $this -> idioma -> get ( 'TB_28' ) ) -> where ( 
		$this -> idioma -> get ( 'TB_21' ),
		$data [ $this -> idioma -> get ( 'TB_21' ) ] ) 
			-> where ( $this -> idioma -> get ( 'TB_22' ),
		$data [ $this -> idioma -> get ( 'TB_22' ) ] == '1' ? 'T' : 'A' ) 
			-> first ( );
		return $this -> salvar ( $data, $usuario );
	
	}

	private function salvar (array $data , $usuario)
	{

		$this -> id = EvssaFunciones :: objetoVacio ( $usuario ) ? EvssaFunciones :: concecutivo ( 
		$this ) : EvssaFunciones :: cerosIzquierda ( $usuario -> id );
		$this -> alias = $data [ $this -> idioma -> get ( 'TB_29' ) ];
		$this -> email = EvssaFunciones :: objetoVacio ( $usuario ) ? $data [ $this -> idioma -> get ( 
		'TB_21' ) ] : $usuario -> email;
		$this -> password = bcrypt ( 
		$data [ $this -> idioma -> get ( 'TB_30' ) ] );
		$this -> tipo_usuario = $data [ $this -> idioma -> get ( 
		'TB_22' ) ] == '1' ? 'A' : 'T';
		$id = $this -> id;
		$this -> save ( );
		$this -> id = $id;
		$paginado = new Paginado ( );
		$paginado -> crear ( $this );
		return $this;
	
	}

	public function paginados ( )
	{

		return $this -> hasOne ( 'Tutores\Paginado', 'id_usuario' );
	
	}

}
