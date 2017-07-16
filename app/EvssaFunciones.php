<?php
/**
 * Created by PhpStorm.
 * User: Juan Camilo
 * Date: 08/07/2017
 * Time: 10:21 PM
 */

namespace App;


class EvssaFunciones
{
    public static function variableVacio($variable){
        return ($variable==NULL || $variable=="");
    }
    public static function cerosIzquierda($id){
        return str_pad($id, 15, "0", STR_PAD_LEFT);
    }
    public static function convertirIdEntero($idCadena){
        return intval($idCadena);
    }
    public static function objetoVacio($objeto){
     return  $objeto==null;
    }
}