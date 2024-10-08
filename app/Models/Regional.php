<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'direccion',
        'id_departamento'
    ];

    //Relationship: un regional tiene muchos centro_formacion
    public function centro_formacion()
    {
        return $this->hasMany(Centro_formacion::class);
    }

    //Relationship: muchos regional tienen un departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
