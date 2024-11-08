<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jefe_Inmediato extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'empresa_id',
        'usuario_id',
    ];

    //Relationship: un jefe inmediato es muchos usuarios
    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }

    //Relationship: muchos jefes inmediatos pertenecen una empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    //Relationship: un jefe inmediato supervisa muchas practicas
    public function practica()
    {
        return $this->hasMany(Practica::class);
    }
}
