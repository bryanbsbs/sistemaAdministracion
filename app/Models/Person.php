<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    static $rules = [
		'razonSocial' => 'required',
		'persona' => 'required',
		'rfc' => 'required',
		'domicilio' => 'required',
		'email' => 'required',
		'telefono' => 'required',
        'tipo' => 'required',
    ];

    protected $table = 'persons';

    protected $fillable = ['razonSocial','persona','rfc','domicilio','email','telefono','tipo'];

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'person_id', 'id');
    }
}
