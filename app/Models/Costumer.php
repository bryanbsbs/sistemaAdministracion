<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Costumer
 *
 * @property $id
 * @property $razonSocial
 * @property $persona
 * @property $rfc
 * @property $domicilio
 * @property $email
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Advance[] $advances
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Costumer extends Model
{
    
    static $rules = [
		'razonSocial' => 'required',
		'persona' => 'required',
		'rfc' => 'required',
		'domicilio' => 'required',
		'email' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['razonSocial','persona','rfc','domicilio','email','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function advances()
    {
        return $this->hasMany('App\Models\Advance', 'costumer_id', 'id');
    }
    

}
