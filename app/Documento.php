<?php

namespace Tutores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tutores\Evssa\EvssaGeneral;
use Tutores\Evssa\EvssaPropertie;

class Documento extends Model implements EvssaGeneral {

	protected $table = 'documentos';

	private $idioma;

	protected $fillable = [ 
		
			'id' ,
			'archivo' ,
			'tipo_documento' ,
			'tarea_id' ,
			'updated_at' 
	];

	public function __construct ( )
	{

		$this -> init ( );
	
	}

	public function init ( )
	{

		$this -> idioma = new EvssaPropertie ( );
	
	}

	public function crear (Request $request , $tarea_id , $requesNameFile)
	{

		foreach ( $request -> file ( $requesNameFile ) as $file )
		{
			$archivo = new Archivos ( $file );
			$documento = $this -> create ( 
			[ 
				
					$this -> idioma -> get ( 'TB_16' ) => $archivo -> quitarExtension ( ) ,
					$this -> idioma -> get ( 'TB_17' ) => $tarea_id ,
					$this -> idioma -> get ( 'TB_18' ) => $archivo -> getExtension ( ) 
			] );
			$archivo -> guardarArchivo ( $documento -> updated_at );
		}
	
	}

	public function extension ($id)
	{

		$documento = $this -> find ( $id );
		$archivos = new Archivos ( null );
		return $archivos -> cadenaExtension ( $documento -> archivo,
		$documento -> tipo_documento, $documento -> updated_at );
	
	}

	/**
	 * Get the post that owns the comment.
	 */
	public function tareas ( )
	{

		return $this -> belongsTo ( 'Tutores\Tarea' );
	
	}

}
