<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

use App\Organizacion;
use App\Pregunta;
// use App\Nomina;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'usuarios';


    protected $fillable = [

        'nombre','apellido','cedula','email','password','organizacion_id','pregunta_id', 'respuesta'

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
     * Relaciones entre pregunta y usuarios.
     *
     *  1 a N
     * 
     * @var array
     */
    
    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }



}



