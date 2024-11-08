<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa_formacion extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo_programa',
        'denominacion',
        'version',
        'etapa_lectiva',
        'etapa_productiva',
        'total_horas',
        'tipo_programa',
        'titulo_certificado',
        'centro_formacion_id',
        'instructor_id',
        'aprendiz_id',
    ];

    //Relationship: un programa de formacion tiene un aprendiz
    public function aprendiz()
    {
        return $this->hasOne(Aprendiz::class);
    }

    //Relationship: muchos programas de formacion tienen un centro de formacion
    public function centro_formacion()
    {
        return $this->belongsTo(Centro_formacion::class);
    }

    //Relationship: un instructor tiene muchos programas de formacion
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
