<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
            'razonSocial' => 'required|string|max:50',
            'persona' => 'required|in:Fisica,Moral',
            'rfc' => 'required|string|min:13|max:13',
            'domicilio' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'telefono' => 'required|string|min:9|max:10',
            'tipo' => 'required|in:Cliente, Proveedor',
        ];
    }
}
