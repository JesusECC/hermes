<?php

namespace hermes;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //
    protected $table='Provincia';
    protected $primarykey='id';
    public $timestamps=false;
    
    protected $filleable=[
        'nombre_provincia',
        'Departamento_idDepartamento',
    ];
    protected $guarded=[

    ];
}
