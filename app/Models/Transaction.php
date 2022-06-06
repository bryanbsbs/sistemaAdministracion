<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    static $rules = [
		'person_id' => 'required',
		'project_id' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'metodo' => 'required',
		'referencia' => 'required',
    ];

    protected $table = 'transactions';

    protected $fillable = ['person_id','project_id','monto','fecha','metodo','referencia'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
