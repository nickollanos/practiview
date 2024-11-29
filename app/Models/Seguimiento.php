<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'practica_id',
        'fecha_concertacion',
        'evidencia_concertacion',
        'fecha_evaluacion_parcial',
        'evidencia_evaluacion_parcial',
        'fecha_evaluacion_final',
        'evidencia_evaluacion_final',
        'bitacora_id'
    ];

    //Relationship: un control y seguimiento tiene muchas bitacoras
    public function bitacora()
    {
        return $this->hasMany(Bitacora::class);
    }
}
