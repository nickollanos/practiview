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
        'siglas'
    ];

    //Relationship: un centro_formacion tiene muchos programa_formacion
    public function programa_formacion()
    {
        return $this->hasMany(Programa_formacion::class);
    }

    //Relationship: muchos centro_formacion tienen una regional
    public function regional()
    {
        return $this->belongsTo(Regional::class);
    }
}
