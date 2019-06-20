<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Usuario;

class Pregunta extends Model
{
    protected $table = 'preguntas';


    protected $fillable = [

        'pregunta'

    ];

    public function preguntas()
    {
        return $this->hasMany('App\Usuario');
    }
}
