<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Person extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->hasMany(Transaction::class);
    }
}
