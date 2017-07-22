<?php

namespace Tutores;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {

	protected $table = "areas";

	/**
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	 */
	protected $fillable = [ 
		'id' , 'nombre' 
	];

	/**
	 * metodo que obtiene todas las areas de la base de datos
	 * @return \Illuminate\Database\Eloquent\Collection[]
	 */
	public function areaAll ( )
	{

		return $this -> all ( );
	
	}

}
