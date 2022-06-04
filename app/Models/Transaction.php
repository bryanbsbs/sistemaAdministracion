<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pay
 *
 * @property $id
 * @property $provider_id
 * @property $project_id
 * @property $monto
 * @property $fecha
 * @property $metodo
 * @property $referencia
 * @property $created_at
 * @property $updated_at
 *
 * @property Project $project
 * @property Provider $provider
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
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
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    public function person()
    {
        return $this->hasOne('App\Models\Person', 'id', 'person_id');
    }
}
