<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoAdd extends FormRequest
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

    public function wantsJson()
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
            'tipo'=>'required|numeric',
            'orden_compras_mercado'=>'required|string',
            'codigo_mercado_publico'=>'required|numeric',
            'valor_dolar'=>'required|numeric',
            'descripcion'=>'required|string',
            'categoria_mercado_publico'=>'required|string',
            'cantidad'=>'required|numeric|max:100',
            'unidad_de_ingreso'=>'required|numeric',
            'ingreso_cantidad'=>'required|numeric',
        ];
    }
}
