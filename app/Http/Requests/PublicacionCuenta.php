<?php

namespace Tutores\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionCuenta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [           
            'area'          => 'required',
            'titulo_tarea'  => 'required',
            'archivos'      => 'required',
            'titulo'        => 'required',
            'descripcion'   => 'required',
            'fecha_final'   => 'required',
            'valor'         => 'required',
            'estado'        => 'required',
        ];
    }
}
