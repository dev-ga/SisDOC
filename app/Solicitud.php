<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitudes';

    protected $fillable = [

        'usuario_id','nombresol','apellidosol','cedulasol','emailsol','tiposol','estatus_id'

    ];

    public function statuscolicitud()
    {
        return $this->belongsTo('App\EstatusSolicitud');
    }

    
}


