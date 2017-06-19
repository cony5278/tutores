<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class Archivos 
{

      private $file;
      private $nombre;
      private $extension;
      private $nombreCarpeta;
      public function __construct($file)
      {         	  
          if($file!=null){
            $this->file=$file;
            $this->encriptarNombreCarpeta();
            $this->addExtension();   
            $this->setNombre();  
          }       
      }
  
      /**
      *metodo que agrega el nombre para la carpeta que va almacenar el documento
      */
      private Function seleccionarExtension($extension){
      	switch ($extension) {
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
          	return $extension;
      		break;
      	}

      	return null;
      }

      public function cadenaExtension($nombreArchivo){
          $trozos = explode("." , $nombreArchivo);
          $cuantos = count($trozos);
          $ext = $trozos[$cuantos - 1];         
          return $this->renderizarExtension((string) $ext,$nombreArchivo);
      }

      private function renderizarExtension($extension,$nombreArchivo){   
            switch($extension) {
              case "xls":
                  return "http://localhost:8000/img/xls.jpg";
                  break;
              case "csv":
                  return "http://localhost:8000/img/csv.jpg";
                  break;
              case "xlsx":
                  return "http://localhost:8000/img/xls.jpg";
              break;
              case "pdf":
                  return "http://localhost:8000/img/pdf.jpg";
              break;
              case "docx":
                  return "http://localhost:8000/img/docx.jpg";
              break;
              case "doc":
                  return "http://localhost:8000/img/docx.jpg";
              break;
              default:
                return "http://localhost:8000"."/archivos".$this->getRuta($extension).'/'.$nombreArchivo;
              break;     
          }
         return null;
      } 

      private function encriptarNombreCarpeta(){
     
        $this->nombreCarpeta=Auth::user()->email;
      }

      private function desEncriptarNombreCarpeta(){
        $this->nombreCarpeta= decrypt($this->nombreCarpeta);
      }
      private function getRuta($extension){

          return '/'.Auth::user()->email.'/'.Auth::user()->tipo_usuario.'/'.$this->seleccionarExtension($extension);
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
     
      /**
      *metodo que guarda el archivo en la ruta especifica
      */
      public Function guardarArchivo(){     
        \Storage::disk('local')->put($this->getRuta($this->extension).'/'.$this->nombre,\File::get($this->file));    
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
