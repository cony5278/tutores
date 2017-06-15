<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class Archivos 
{
      private $rutaCarpeta;
      private $file;
      private $nombre;
      private $extension;
      public function __construct($file)
      {         	  
          $this->file=$file;
          $this->addExtension();          
          $this->rutaCarpeta='/'.Auth::user()->tipo_usuario.Auth::user()->email.'/'.$this->seleccionarExtension();  
          $this->crearDirectorio();
          $this->setNombre();         
      }
      /**
      *metodo que agrega el nombre para la carpeta que va almacenar el documento
      */
      private Function seleccionarExtension(){
      	switch ($this->extension) {
      		case 'png':
      			return 'img';
      		break;
      		case 'jpg':
      			return 'img';
      		break;
      		case 'bmp':
      			return 'img';
      		break;            	      		
      		default:
            echo 'extensiones '.$this->extension;
      			return $this->extension;
      		break;
      	}

      	return null;
      }
      /**
      *metod que adiciona la extension del archivo
      */
      private Function addExtension(){
      	$this->extension=strtolower($this->file->getClientOriginalExtension());
      }
      /**
      *metodo que le concatena al nombre del archivo la hora minutos y segundos
      */
      private function setNombre(){ 
          $carbon=Carbon::now();
          $this->nombre= $carbon->format('H-i-s').$this->file->getClientOriginalName();       
      }
      /*
      *metodo que crear el directorio
      */
      private Function crearDirectorio(){
          if(!is_dir(public_path('archivos').$this->rutaCarpeta)){
             mkdir(public_path('archivos').$this->rutaCarpeta, 0777);      
          }
      }
      /**
      *metodo que guarda el archivo en la ruta especifica
      */
      public Function guardarArchivo(){     
        \Storage::disk('local')->put($this->rutaCarpeta.'/'.$this->nombre,\File::get($this->file));    
      }
      
      /**
      *metodos get y set
      */
      public Function getNombre(){
        return $this->nombre;
      }
      public Function getExtension(){
      	return $this->extension;
      }
}
