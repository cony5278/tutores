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
      private $carbon;
      private $nombreSinExtension;

      public function __construct($file)
      {
          $this->carbon=Carbon::now();
          if($file!=null){
            $this->file=$file;
            $this->nombreSinExtension=basename($this->file->getClientOriginalName(), '.'.$this->file->getClientOriginalExtension());
            $this->encriptarNombreCarpeta();
            $this->addExtension();
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

    /**metodo utilizado para visualizar los archivos en la publicacion
     * @param $nombreArchivo
     * @param $extension
     * @return null|string
     */
      public function cadenaExtension($nombreArchivo,$extension,$date){
          return $this->renderizarExtension($extension,$nombreArchivo,$date);
      }

    /**metodo que seleccionar de acuerdo a la extension la imagen para renderizarlo en el lado del cliente
     * @param $extension
     * @param $nombreArchivo
     * @return null|string
     */
      private function renderizarExtension($extension,$nombreArchivo,$date){

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
                  $hora = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H-i-s');
                return "http://localhost:8000"."/archivos".$this->getRuta($extension).'/'.$hora.$nombreArchivo.'.'.$extension;
              break;     
          }
         return null;
      }

    /**
     * metodo utilizado para encriptar la ruta de toda la carpeta
     */
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
      private function addNombre(){
          $this->nombre= $this->carbon->format('H-i-s').$this->file->getClientOriginalName();
      }
     
      /**
      *metodo que guarda el archivo en la ruta especifica
      */
      public Function guardarArchivo(){
        $this->addNombre();
        \Storage::disk('local')->put($this->getRuta($this->extension).'/'.$this->nombre,\File::get($this->file));
      }

    /**metodo que quita la extension del nombre del archivo en la base de datos
     * @param $nombre
     * @param $extension
     * @return string
     */
      public Function quitarExtension($nombre,$extension){
          return basename(nombre, '.'.$extension);
      }
      public Function copiarArchivo($dateServidor,$nombre,$extension,$cambioNombre){
          echo $dateServidor.' '.$nombre.' '.$extension.' '.$cambioNombre;
          $horaServidor=Carbon::createFromFormat('Y-m-d H:i:s', $dateServidor)->format('H-i-s');

          $nuevaHora=$this->carbon->format('H-i-s');

          $rutaCompleta=$this->getRuta($extension);

          $nombreCompleto='/'.$horaServidor.$nombre.'.'.$extension;
          $nuevoNombreCompleto='/'.$nuevaHora.$cambioNombre.'.'.$extension;

          \Storage::copy($rutaCompleta.$nombreCompleto,$rutaCompleta.$nuevoNombreCompleto);

          $this->eliminarArchivoLocal($rutaCompleta,$nombreCompleto);

      }
      private Function eliminarArchivoLocal($ruta,$nombre){
          \Storage::delete($ruta.$nombre);
      }
    /**
     * @return mixed
     */
    public function getNombreSinExtension()
    {
        return $this->nombreSinExtension;
    }

    /**
     * @param mixed $nombreSinExtension
     */
    public function setNombreSinExtension($nombreSinExtension)
    {
        $this->nombreSinExtension = $nombreSinExtension;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * @return mixed
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param mixed $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }
    /**
     * @return static
     */
    public function getCarbon()
    {
        return $this->carbon;
    }/**
     * @param static $carbon
     */
    public function setCarbon($carbon)
    {
        $this->carbon = $carbon;
    }


}
