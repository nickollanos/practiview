<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'email',
        'sexo',
        'direccion',
        'firma',
        'foto_perfil'
    ];
}
