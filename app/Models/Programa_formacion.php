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
        'denominacion',
        'codigo_programa',
        'version',
        'etapa_lectiva',
        'etapa_productiva',
        'total_horas',
        'tipo_programa',
        'titulo_certificado',
        'id_centro_formacion'
    ];

     //Relationship: muchos programa_formacion tiene muchas fichas
     public function ficha()
     {
         return $this->belongsToMany(Ficha::class);
     }

     //Relationship: muchos programa_formacion tienen una centro_formacion
     public function centro_formacion()
     {
         return $this->belongsTo(Centro_formacion::class);
     }
}
