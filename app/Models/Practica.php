<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'aprendiz_id',
        'modalidad_practica_id',
        'jefe_inmediato_id',
        'fecha_inicio',
        'fecha_fin'
    ];

    //Relationship: una practica tiene un aprendiz
    public function aprendiz()
    {
        return $this->hasOne(Aprendiz::class);
    }

    //Relationship: una practica tiene muchas modalidades de practica
    public function modalidad_practica()
    {
        return $this->hasMany(Modalidad_practica::class);
    }

    //Relationship: muchas practicas son supervisadas por un jefe inmediato
    public function jefe_inmediato()
    {
        return $this->belongsTo(Jefe_Inmediato::class);
    }

    //Relationship: una practica tiene muchas bitacoras
    public function bitacora()
    {
        return $this->hasMany(Bitacora::class);
    }
}
