<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:50',
            'fechaInicio' => 'required',
            'subtotal' => 'required|numeric',
            'concepto' => 'required|string|max:250',
            'comentariosAdicionales' => 'required|string|max:3000',
        ];
    }
}
