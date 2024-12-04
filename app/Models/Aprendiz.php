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
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    //Relationship: un aprendiz tiene una practica
    public function practica()
    {
        return $this->hasOne(Practica::class);
    }

    //Relationship: un aprendiz tiene una ficha
    public function ficha()
    {
        return $this->belongsTo(Ficha::class, 'ficha_id', 'id');
    }

    //Relationship: muchos usuarios tienen un estado
    public function estadoAprendiz()
    {
        return $this->belongsTo(EstadoAprendiz::class, 'estado_aprendiz_id', 'id');
    }

    //Relationship: un aprendiz tiene una certificacion
    public function certificacion()
    {
        return $this->hasOne(Certificacion::class);
    }

}
