<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprendiz extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario_id'
    ];

    //Relationship: un aprendiz es muchos usuarios
    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }

    //Relationship: un aprendiz tiene un programa de formacion
    public function programa_formacion()
    {
        return $this->hasOne(Programa_formacion::class);
    }

    //Relationship: un aprendiz tiene una practica
    public function practica()
    {
        return $this->hasOne(Practica::class);
    }
}
