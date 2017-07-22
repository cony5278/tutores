<?php

namespace Tutores;

use Illuminate\Database\Eloquent\Model;
use Tutores\Evssa\EvssaGeneral;
use Tutores\Evssa\EvssaPropertie;

class Noticia_Publicada extends Model implements EvssaGeneral {

	private $idioma;

	public function __construct ( )
	{

		$this -> init ( );
	
	}

	public function init ( )
	{

		$this -> idioma = new EvssaPropertie ( );
	
	}

}
