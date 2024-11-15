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
        'nombre',
        'direccion',
    ];

    //Relationship: una regional tiene muchos centros de formacion
    public function centro_formacion()
    {
        return $this->hasMany(Centro_formacion::class);
    }

}
