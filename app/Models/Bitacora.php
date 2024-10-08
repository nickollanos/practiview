<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero',
        'numero_ficha',
        'id_regional',
        'id_centro_formacion',
        'id_entidad',
        'id_detalles_actividad',
        'id_modalidad_practica',
        'id_detalles_practica',
        'id_detalles_ficha'
    ];

    //Relationship: una bitacora tiene muchas entidades
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }

    //Relationship: una bitacora tiene muchas modalidad_practica
    public function modalidad_practica()
    {
        return $this->belongsTo(Modalidad_practica::class);
    }

    //Relationship: muchas bitacora tiene muchas actividad_bitacora
    public function actividad_bitacora()
    {
        return $this->belongsToMany(Actividad_bitacora::class);
    }

    //Relationship: muchas bitacora tiene muchas control_seguimiento
    public function control_seguimiento()
    {
        return $this->belongsToMany(Control_seguimiento::class);
    }
}
