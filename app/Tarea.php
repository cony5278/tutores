<?php

namespace Tutores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tutores\Evssa\EvssaGeneral;
use Tutores\Evssa\EvssaPropertie;

class Tarea extends Model implements EvssaGeneral {

	private $idioma;

	protected $table = 'tareas';

	protected $fillable = [ 
		
			'id' ,
			'titulo_tarea' ,
			'estado_entrega' ,
			'area_id' ,
			'publicacion_id' 
	];

	public function __construct ( )
	{

		$this -> init ( );
	
	}

	public function init ( )
	{

		$this -> idioma = new EvssaPropertie ( );
	
	}

	public function crear (Request $request , $area_id , $publicacion_id)
	{

		return $this -> create ( 
		[ 
			
				$this -> idioma -> get ( 'TB_31' ) => $request [ $this -> idioma -> get ( 
				'TB_31' ) ] ,
				$this -> idioma -> get ( 'TB_32' ) => $area_id ,
				$this -> idioma -> get ( 'TB_33' ) => EvssaFunciones :: cerosIzquierda ( 
				$publicacion_id ) ,
				$this -> idioma -> get ( 'TB_34' ) => 'ACEPTADO' 
		] );
	
	}

	/**
	 * Get the comments for the blog post.
	 */
	public function documentos ( )
	{

		return $this -> hasMany ( 'Tutores\Documento' );
	
	}

	/**
	 * Get the post that owns the comment.
	 */
	public function publicaciones ( )
	{

		return $this -> belongsTo ( 'Tutores\publicaciones' );
	
	}

}
