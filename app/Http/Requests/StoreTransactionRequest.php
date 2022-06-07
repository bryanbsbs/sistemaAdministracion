<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'person_id' => 'required',
            'project_id' => 'required',
            'monto' => 'required|numeric',
            'fecha' => 'required',
            'metodo' => 'required|in:Deposito,Transferencia',
            'referencia' => 'required|string|max:255',
        ];
        // 'title' => 'required|unique|max:255',
        // 'body' => 'required',
        // 'nombre' => 'required|string|size:60',
        // 'sabor' => 'required|in:chocolate,vainilla,cheesecake'
    }
}
