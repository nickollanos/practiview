<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad_practica extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'modalidad',
        'detalles'
    ];

    //Relationship: muchos modalidad_practica tiene una bitacora
    public function bitacora()
    {
        return $this->belongsToMany(Bitacora::class);
    }
}
