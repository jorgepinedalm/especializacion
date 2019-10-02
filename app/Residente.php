<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residente extends Model
{

    protected $table   = 'residentes';
    public $timestamps = true;

    public function tipo_documento()
    {
        return $this->belongsTo('App\Tipo_Documento');
    }

    public function apartamentos()
    {
        return $this->belongsToMany('App\Apartamento', 'apartamentos_residentes');
    }

}
