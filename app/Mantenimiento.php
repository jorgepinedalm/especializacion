<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model 
{

    protected $table = 'mantenimientos';
    public $timestamps = true;

    public function categoria()
    {
        return $this->hasOne('App\Categoria');
    }

    public function estado()
    {
        return $this->hasOne('App\Estado_Mantenimiento');
    }

    public function apartamento_residente()
    {
        return $this->hasOne('App\Apartamento_Residente');
    }

}