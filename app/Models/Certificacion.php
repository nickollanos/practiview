<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'aprendiz_id',
        'certificacion_ape',
        'devolucion_carnet',
        'certificado_tyt',
        'solicitud_certificacion',
        'observaciones'
    ];

    //Relationship: un aprendiz tiene una certificacion
    public function aprendiz()
    {
        return $this->hasOne(Aprendiz::class);
    }
}
