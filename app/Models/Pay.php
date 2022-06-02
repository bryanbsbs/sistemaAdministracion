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
class Pay extends Model
{
    
    static $rules = [
		'provider_id' => 'required',
		'project_id' => 'required',
		'monto' => 'required',
		'fecha' => 'required',
		'metodo' => 'required',
		'referencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['provider_id','project_id','monto','fecha','metodo','referencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provider()
    {
        return $this->hasOne('App\Models\Provider', 'id', 'provider_id');
    }
    

}
