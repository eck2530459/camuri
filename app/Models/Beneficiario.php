<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{    
    protected $table = 'fps_beneficiarios';
    use HasFactory;
    //use SoftDeletes;
  //  protected $with = ['solicitud'];

    protected $fillable = ['id','genero','cedula','nacionalidad','email', 'apellidos','telefono','nombres', 'creado_por','direccion_detalle',
     'estado_id','municipio_id','parroquia_id', 'fecha_nacimiento', 'pais_id', 'deleted_at', 'fps_beneficiario_id', 'actualizado_por',
     'fk_beneficiario_id',
             'estado_civil',
            'nivel_academico', 
           'ocupacion_u_oficio', 
            'carnet_patria',
           'discapacidad', 
            'describa_discapacidad', 
          'centro_votacion',
            'centro_votacion_parroquia_id',
            'ubch',
    ];


public function paises()
{
    return $this->belongsTo(Pais::class, 'pais_id')->withDefault();
}

public function estados()
{
    return $this->belongsTo(Estado::class, 'estado_id')->withDefault();
}

public function municipios()
{
    return $this->belongsTo(Municipio::class, 'municipio_id')->withDefault();
}

public function parroquias()
{
    return $this->belongsTo(Parroquia::class, 'parroquia_id')->withDefault();
}
}