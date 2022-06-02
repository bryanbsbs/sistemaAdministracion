<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Provider
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
 * @property Pay[] $pays
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Provider extends Model
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
    public function pays()
    {
        return $this->hasMany('App\Models\Pay', 'provider_id', 'id');
    }
    

}
