<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Organizacion extends Model
{

    protected $table = 'organizaciones';

    protected $fillable = [

        'cod_emp_sigesp','descripcion_sigesp'

    ];

    /**
     * Relaciones entre organizaciones y usuarios.
     *
     *  1 a N
     * 
     * @var array
     */


    public function organizaciones()
    {
        return $this->hasMany('App\Usuario');
    }
    
}
