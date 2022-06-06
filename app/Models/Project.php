<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;

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
