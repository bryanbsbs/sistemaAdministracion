<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    static $rules = [
		'nombre' => 'required',
		'fechaInicio' => 'required',
		'subtotal' => 'required',
		'concepto' => 'required',
		'comentariosAdicionales' => 'required',
    ];

    protected $fillable = ['nombre','fechaInicio','subtotal','concepto','comentariosAdicionales','iva','total', 'progresoPago', 'progresoAnticipo', 'estado'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
