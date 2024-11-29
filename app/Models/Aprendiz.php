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
        'usuario_id',
        'ficha_id'
    ];

    //Relationship: un aprendiz es muchos usuarios
    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }

    //Relationship: un aprendiz tiene una practica
    public function practica()
    {
        return $this->hasOne(Practica::class);
    }

    //Relationship: un aprendiz tiene una ficha
    public function ficha()
    {
        return $this->hasOne(Ficha::class);
    }

    //Relationship: muchos usuarios tienen un estado
    public function estadoAprendiz()
    {
        return $this->belongsTo(EstadoAprendiz::class);
    }

    //Relationship: un aprendiz tiene una certificacion
    public function certificacion()
    {
        return $this->hasOne(Certificacion::class);
    }
}
