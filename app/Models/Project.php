<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property $id
 * @property $nombre
 * @property $fechaInicio
 * @property $subtotal
 * @property $iva
 * @property $total
 * @property $concepto
 * @property $comentariosAdicionales
 * @property $created_at
 * @property $updated_at
 *
 * @property Advance[] $advances
 * @property Pay[] $pays
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Project extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'fechaInicio' => 'required',
		'subtotal' => 'required',
		'iva' => 'required',
		'total' => 'required',
		'concepto' => 'required',
		'comentariosAdicionales' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','fechaInicio','subtotal','iva','total','concepto','comentariosAdicionales'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function advances()
    {
        return $this->hasMany('App\Models\Advance', 'project_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pays()
    {
        return $this->hasMany('App\Models\Pay', 'project_id', 'id');
    }
    

}
