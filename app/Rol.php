<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [

        'tipo'

    ];

    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }
}
