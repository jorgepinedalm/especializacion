<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Tipo_Documento extends Model
{

    protected $table   = 'tipos_documentos';
    public $timestamps = true;

    public function scopeGetTiposDocumento($query)
    {
        return $query->select('id', DB::raw('CONCAT(abbr," - ",nombre) as nombre'))->where('estado', 1)->get();
    }
}
