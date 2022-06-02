<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Advance
 *
 * @property $id
 * @property $costumer_id
 * @property $project_id
 * @property $monto
 * @property $fecha
 * @property $metodo
 * @property $referencia
 * @property $created_at
 * @property $updated_at
 *
 * @property Costumer $costumer
 * @property Project $project
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Advance extends Model
{
    
    static $rules = [
		'costumer_id' => 'required',
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
    protected $fillable = ['costumer_id','project_id','monto','fecha','metodo','referencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function costumer()
    {
        return $this->hasOne('App\Models\Costumer', 'id', 'costumer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }
    

}
