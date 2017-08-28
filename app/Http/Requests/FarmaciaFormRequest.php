<?php

namespace SistemaFarmacia\Http\Requests;

use SistemaFarmacia\Http\Requests\Request;

class FarmaciaFormRequest extends Request
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
            //
        	'nombre'=>'required',
            'direccion'=>'required',
            'latitud'=>'required',
            'longitud'=>'required',
            'estaPago'=>'required',
            'localidad'=>'required',
            'turno'=>'required' 
        ];
    }
}