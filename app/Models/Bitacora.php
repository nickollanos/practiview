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
}
