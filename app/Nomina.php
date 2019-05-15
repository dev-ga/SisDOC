<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Nomina extends Model
{
    protected $table = 'nominas';

    protected $fillable = [

        'cod_nomina_sigesp','descripcion_sigesp','organizacion_id'

    ];

    /**
     * Relaciones entre nominas y usuarios.
     *
     *  N a M
     * 
     * @var array
     */
    
    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario', 'usuario_id');
    }

}
