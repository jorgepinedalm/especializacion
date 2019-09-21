<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model 
{

    protected $table = 'apartamentos';
    public $timestamps = true;

    public function residentes()
    {
        return $this->belongsToMany('App\Residente', 'apartamentos_residentes');
    }

}