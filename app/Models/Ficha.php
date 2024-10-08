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
        'id_gestor'
    ];

    //Relationship: muchos programa_formacion tienen una centro_formacion
    public function programa_formacion()
    {
        return $this->belongsToMany(Programa_formacion::class);
    }
}
