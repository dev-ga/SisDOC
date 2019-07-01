<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstatusSolicitud extends Model
{
    protected $table = 'statussolicitud';

    protected $fillable = [

        'tipo'

    ];

    public function solicitudes()
    {
        return $this->hasMany('App\Solicitud');
    }
}
