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
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    //Relationship: muchos instructores tienen muchos roles
    public function rol()
    {
        return $this->belongsToMany(Rol::class, 'instructor_rol');
    }

    //Relationship: muchos instrctores tienen una ficha
    public function ficha()
    {
        return $this->belongsTo(Ficha::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_instructor_id'); // Ajusta la clave foránea si es diferente
    }
}
