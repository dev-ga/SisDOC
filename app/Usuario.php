<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

use App\Organizacion;
use App\Nomina;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'usuarios';


    protected $fillable = [

        'nombre','apellido','cedula','email','password','organizacion_id',

    ];


    protected $hidden = [

        'password','remember_token'

    ];


    /**
     * Relaciones entre usuarios y organizaciones.
     *
     *  1 a N
     * 
     * @var array
     */


    public function organizacion()
    {
        return $this->belongsTo('App\Organizacion');
    }

    /**
     * Relaciones entre nominas y usuarios.
     *
     *  N a M
     * 
     * @var array
     */
    
    public function nominas()
    {
        return $this->belongsToMany('App\Nomina', 'nomina_id');
    }



}



