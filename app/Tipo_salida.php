<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Tipo_salida extends Model
{
    //
    protected $table='Tipo_salida';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre',
    ];
    protected $guarded=[

    ];
}
