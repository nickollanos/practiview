<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro_formacion extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'siglas',
        'regional_id'
    ];

    //Relationship: un centro de formacion tiene muchos programas de formacion
    public function programa_formacion()
    {
        return $this->hasMany(Programa_formacion::class);
    }

    //Relationship: muchos centros de formacion tienen una regional
    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }
}
