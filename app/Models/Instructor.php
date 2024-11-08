<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario_id',
    ];

    //Relationship: un instructor es muchos usuarios
    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }

    //Relationship: muchos instructores tienen muchos roles
    public function rol()
    {
        return $this->belongsToMany(Rol::class, 'instructor_rol');
    }

    //Relationship: un instructor tiene muchos programas de formacion
    public function programa_formacion()
    {
        return $this->hasMany(Programa_formacion::class);
    }
}
