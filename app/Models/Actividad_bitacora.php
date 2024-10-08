<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad_bitacora extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'evidencia',
        'observacion'
    ];

    //Relationship: actividad_bitacora bitacora tiene muchas bitacora
    public function bitacora()
    {
        return $this->belongsToMany(Bitacora::class);
    }
}
