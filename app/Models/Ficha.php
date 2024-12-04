<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero_ficha',
        'programa_formacion_id',
        'instructor_id'
    ];

    //Relationship: una ficha tiene muchos programa de formacion
    public function programa_formacion()
    {
        return $this->belongsTo(Programa_formacion::class, 'programa_formacion_id', 'id');
    }

    //Relationship: una ficha tiene muchos instructores
    public function instructor()
    {
        return $this->hasMany(Instructor::class);
    }

    //Relationship: una ficha tiene un aprendiz
    public function aprendiz()
    {
        return $this->hasOne(Aprendiz::class, 'ficha_id', 'id');
    }
}
