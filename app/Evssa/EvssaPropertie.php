<?php
namespace Tutores\Evssa;

use Illuminate\Support\Facades\Config;

class EvssaPropertie
{

	public function __construct ( )
	{
	}

	public function get (
		$key)
	{
		return Config :: get ( 
			'properties.' .
				 $key );
	}

	public function getUpper (
		$key)
	{
		return strtoupper ( 
			Config :: get ( 
				'properties.' .
					 $key ) );
	}
}

