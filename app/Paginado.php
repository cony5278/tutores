<?php

namespace Tutores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Tutores\Evssa\EvssaGeneral;
use Tutores\Evssa\EvssaPropertie;

class Paginado extends Model implements EvssaGeneral {

	private $idioma;

	protected $table = 'paginados';

	protected $fillable = [ 
		
			'id' ,
			'inicial' ,
			'final' ,
			'id_usuario' ,
			'email' ,
			'tipo_usuario' 
	];

	public function __construct ( )
	{

		$this -> init ( );
	
	}

	public function init ( )
	{

		$this -> idioma = new EvssaPropertie ( );
	
	}

	/**
	 * mtodo para crear un registro el la tabla
	 * 
	 * @param $id_usuario
	 * @return mixed
	 */
	public function crear ($usuario)
	{

		return $this -> create ( 
		[ 
			
				$this -> idioma -> get ( 'TB_19' ) => EvssaFunciones :: concecutivo ( 
				$this ) ,
				$this -> idioma -> get ( 'TB_20' ) => EvssaFunciones :: cerosIzquierda ( 
				$usuario -> id ) ,
				$this -> idioma -> get ( 'TB_21' ) => $usuario -> email ,
				$this -> idioma -> get ( 'TB_22' ) => $usuario -> tipo_usuario 
		] );
	
	}

	public function users ( )
	{

		return $this -> belongsTo ( 'Tutores\User' );
	
	}

	public static function resetearPaginado ( )
	{

		$paginado = Auth :: user ( ) -> paginados ( ) -> first ( );
		$paginado -> inicial = 0;
		$paginado -> final = 9;
		$paginado -> save ( );
	
	}

	public static function addPaginado ( )
	{

		$paginado = Auth :: user ( ) -> paginados ( ) -> first ( );
		$paginado -> inicial = $paginado -> inicial + 9;
		$paginado -> final = $paginado -> final + 9;
		$paginado -> save ( );
		return $paginado;
	
	}

}
