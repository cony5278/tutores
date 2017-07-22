<?php

namespace Tutores;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tutores\Evssa\EvssaPropertie;
use Tutores\Evssa\EvssaGeneral;

class Publicacion extends Model implements EvssaGeneral {

	private $idioma;

	protected $table = 'publicaciones';

	protected $fillable = [ 
		
			'id' ,
			'titulo' ,
			'descripcion' ,
			'valor' ,
			'fecha_inicial' ,
			'fecha_final' ,
			'estado' ,
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

	private function seleccionarEstado (Request $request)
	{

		switch ( $request [ 'estado' ] )
		{
			case '1' :
				return 'URGENTE';
			break;
			case '2' :
				return 'MUYURGENTE';
			break;
			case '3' :
				return 'URGENTE';
			break;
		}
		return null;
	
	}

	public function crear (Request $request)
	{

		return $this -> create ( 
		[ 
			
				$this -> idioma -> get ( 'TB_19' ) => EvssaFunciones :: concecutivo ( 
				$this ) ,
				$this -> idioma -> get ( 'TB_10' ) => $request [ $this -> idioma -> get ( 
				'TB_10' ) ] ,
				$this -> idioma -> get ( 'TB_23' ) => $request [ $this -> idioma -> get ( 
				'TB_23' ) ] ,
				$this -> idioma -> get ( 'TB_24' ) => Carbon :: now ( ) ,
				$this -> idioma -> get ( 'TB_25' ) => $request [ $this -> idioma -> get ( 
				'TB_25' ) ] ,
				$this -> idioma -> get ( 'TB_26' ) => $request [ $this -> idioma -> get ( 
				'TB_26' ) ] ,
				$this -> idioma -> get ( 'TB_20' ) => EvssaFunciones :: cerosIzquierda ( 
				Auth :: user ( ) -> id ) ,
				$this -> idioma -> get ( 'TB_21' ) => Auth :: user ( ) -> email ,
				$this -> idioma -> get ( 'TB_22' ) => Auth :: user ( ) -> tipo_usuario ,
				$this -> idioma -> get ( 'TB_27' ) => $this -> seleccionarEstado ( 
				$request ) 
		] );
	
	}

	/**
	 * todas las publicaciones de un usuario en especifico
	 * 
	 * @return mixed
	 */
	public function publicacionUsuarioAll ( )
	{

		return $this -> paginar ( 0, 9 );
	
	}

	/**
	 * la ultima publicacion creada por un usuario
	 * 
	 * @return mixed
	 */
	public function publicacionUsuarioUltimo ( )
	{

		return $this -> where ( $this -> idioma -> get ( 'TB_20' ),
		Auth :: user ( ) -> id ) 
			-> where ( $this -> idioma -> get ( 'TB_21' ),
		Auth :: user ( ) -> email ) 
			-> where ( $this -> idioma -> get ( 'TB_22' ),
		Auth :: user ( ) -> tipo_usuario ) 
			-> orderBy ( $this -> idioma -> get ( 'TB_19' ), 'desc' ) 
			-> take ( 1 ) 
			-> first ( );
	
	}

	public function paginar ($inicial , $final)
	{

		return $this -> where ( $this -> idioma -> get ( 'TB_20' ),
		Auth :: user ( ) -> id ) 
			-> where ( $this -> idioma -> get ( 'TB_21' ),
		Auth :: user ( ) -> email ) 
			-> where ( $this -> idioma -> get ( 'TB_22' ),
		Auth :: user ( ) -> tipo_usuario ) 
			-> orderBy ( $this -> idioma -> get ( 'TB_19' ), 'desc' ) 
			-> offset ( $inicial ) 
			-> limit ( $final ) 
			-> get ( );
	
	}

	/**
	 * metodo que actualiza la informacion de una publicacion
	 * 
	 * @param Request $request
	 * @param $id
	 */
	public function actualizar (Request $request , $id)
	{

		$publicacion = $this -> find ( 
		'' . EvssaFunciones :: cerosIzquierda ( $id ) . '' );
		$publicacion -> titulo = $request -> titulo;
		$publicacion -> descripcion = $request -> descripcion;
		$publicacion -> tareas -> first ( ) -> titulo_tarea = $publicacion -> tareas -> first ( ) -> titulo_tarea;
		foreach ( $publicacion -> tareas -> first ( ) -> documentos as $documento )
		{
			if ( $documento -> archivo != $request -> input ( 
			'' . $documento -> id . '' ) )
			{
				$archivo = new Archivos ( null );
				$archivoNombre = $documento -> archivo;
				$dateServidor = $documento -> updated_at;
				$documento -> archivo = $request -> input ( 
				'' . $documento -> id . '' );
				$documento -> save ( );
				$archivo -> copiarArchivo ( $dateServidor,
				$documento -> updated_at, $archivoNombre,
				$documento -> tipo_documento,
				$request -> input ( '' . $documento -> id . '' ) );
			}
		}
		$publicacion -> tareas -> first ( ) -> documentos -> first ( ) -> save ( );
		$publicacion -> tareas -> first ( ) -> save ( );
		$publicacion -> save ( );
	
	}

	/**
	 * metodo que se utiliza para eliminar una publicacion
	 * 
	 * @param $id
	 */
	public function eliminar ($id)
	{

		$publicacion = $this -> find ( 
		'' . EvssaFunciones :: cerosIzquierda ( $id ) . '' );
		$publicacion -> tareas -> first ( ) 
			-> documentos ( ) 
			-> delete ( );
		$publicacion -> tareas -> first ( ) -> delete ( );
		$publicacion -> delete ( );
	
	}

	/**
	 * metodo que se utiliza para eliminar una publicacion
	 * 
	 * @param $id
	 */
	public function eliminarArchivos (Request $request , $id)
	{

		$publicacion = $this -> find ( 
		'' . EvssaFunciones :: cerosIzquierda ( $id ) . '' );
		foreach ( $publicacion -> tareas -> first ( ) -> documentos as $documento )
		{
			if ( ! EvssaFunciones :: variableVacio ( 
			$request -> input ( 'eliminar-' . $documento -> id . '' ) ) )
			{
				$archivo = new Archivos ( null );
				$documento -> delete ( );
				$archivo -> eliminarArchivo ( $documento -> updated_at,
				$documento -> archivo, $documento -> tipo_documento );
			}
		}
	
	}

	public function addArchivos (Request $request , $id)
	{

		$tarea_id = $this -> find ( 
		'' . EvssaFunciones :: cerosIzquierda ( $id ) . '' ) -> tareas -> first ( ) -> id;
		$documento = new Documento ( );
		$documento -> crear ( $request, $tarea_id,
		$this -> idioma -> get ( 'TB_13' ) );
	
	}

	/**
	 * obtener las tareas para las publicaciones
	 */
	public function tareas ( )
	{

		return $this -> hasMany ( 'Tutores\Tarea' );
	
	}

}
