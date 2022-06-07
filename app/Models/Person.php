<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Dyrynda\Database\Support\CascadeSoftDeletes;


class Person extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $table = 'persons';

    protected $fillable = ['razonSocial','persona','rfc','domicilio','email','telefono','tipo'];

    protected $cascadeDeletes = ['transactions'];

    protected $dates = ['deleted_at'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
