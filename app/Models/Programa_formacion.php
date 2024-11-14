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
        'siglas',
        'denominacion',
        'version',
        'etapa_lectiva',
        'etapa_productiva',
        'total_horas',
        'tipo_programa',
        'titulo_certificado',
        'centro_formacion_id',
    ];

    //Relationship: muchos programas de formacion tienen un centro de formacion
    public function centro_formacion()
    {
        return $this->belongsTo(Centro_formacion::class);
    }

    //Relationship: muchos programas de formacion tienen una ficha
    public function ficha()
    {
        return $this->belongsTo(Ficha::class);
    }

}
