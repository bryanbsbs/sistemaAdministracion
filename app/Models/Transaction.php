<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    static $rules = [
		'person_id' => 'required',
		'project_id' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'metodo' => 'required',
		'referencia' => 'required',
    ];

    protected $table = 'transaction';

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
