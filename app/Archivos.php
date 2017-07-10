<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Archivos 
{

      private $file; 

      public function __construct($file)
      {      
            $this->file=$file;  
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
              case EvssaConstantes::XLS:
                  return EvssaConstantes::RUTA_IMG.EvssaConstantes::XLS.".".EvssaConstantes::JPG;
                  break;
              case EvssaConstantes::CSV:
                  return EvssaConstantes::RUTA_IMG.EvssaConstantes::CSV.".".EvssaConstantes::JPG;
                  break;
              case EvssaConstantes::XLSX:
                  return EvssaConstantes::RUTA_IMG.EvssaConstantes::XLS.".".EvssaConstantes::JPG;
                  break;
              case EvssaConstantes::PDF:
                  return EvssaConstantes::RUTA_IMG.EvssaConstantes::PDF.".".EvssaConstantes::JPG;
                  break;
              case EvssaConstantes::DOCX:
                  return EvssaConstantes::RUTA_IMG.EvssaConstantes::DOCX.".".EvssaConstantes::JPG;
                  break;
              case EvssaConstantes::DOC:
                  return EvssaConstantes::RUTA_IMG.EvssaConstantes::DOCX.".".EvssaConstantes::JPG;
                  break;
              default:
                return EvssaConstantes::RUTA.EvssaConstantes::BARRA.EvssaConstantes::ARCHIVOS.EvssaConstantes::BARRA.$this->nombreRutaArchivos($date,$extension,$nombreArchivo).'.'.$extension;
              break;     
          }
         return null;
      }

      private function getRuta($extension){

          return '';
      }

      private function nombreRutaArchivos($dateServidor,$extension,$nombre){
        $nombreAux=Carbon::createFromFormat('Y-m-d H:i:s', $dateServidor)->format('H-i-s')
          .$nombre;

          return Auth::user()->tipo_usuario.'/'.$extension.'/'.$nombreAux;
      }

      private function nombreRutaArchivo($dateServidor){
         return $this->nombreRutaArchivos(
          $dateServidor,
          $this->file->getClientOriginalExtension(),
          $this->file->getClientOriginalName());
      }

     
      /**
      *metodo que guarda el archivo en la ruta especifica
      */
      public function guardarArchivo($dateServidor){
       
        \Storage::disk(EvssaConstantes::LOCAL)->put($this->nombreRutaArchivo($dateServidor),\File::get($this->file));
      }

    /**metodo que quita la extension del nombre del archivo en la base de datos
     * @param $nombre
     * @param $extension
     * @return string
     */
      public function quitarExtension(){
          return basename($this->file->getClientOriginalName(), '.'.$this->file->getClientOriginalExtension());
      }
      public function copiarArchivo($dateServidor,$newDate,$nombre,$extension,$cambioNombre){

          $rutaCompleta=$this->nombreRutaArchivos($dateServidor,$extension,$nombre).".".$extension;
          $rutaCompletaNueva=$this->nombreRutaArchivos($newDate,$extension,$cambioNombre).".".$extension;


          \Storage::copy($rutaCompleta,$rutaCompletaNueva);

          $this->eliminarArchivoLocal($rutaCompleta);

      }

    /**
     * metodo utilizado para eliminar un arhivo local
     * @param $dateServidor
     * @param $nombre
     * @param $extension
     */
    public function eliminarArchivo($dateServidor,$nombre,$extension){
        $this->eliminarArchivoLocal($this->nombreRutaArchivos($dateServidor,$extension,$nombre).".".$extension);
    }
    /**
     * metodo utilizado para eliminar un archivo almacenado
     * @param $ruta
     */
      private function eliminarArchivoLocal($ruta){
          \Storage::delete($ruta);
      }
      public function getExtension(){
          return $this->file->getClientOriginalExtension();
      }

}
