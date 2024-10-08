<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_seguimiento extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'actividad',
        'evidencia_aprendizaje',
        'fecha',
        'lugar'
    ];

    //Relationship: muchos control_seguimiento tiene muchas bitacora
    public function bitacora()
    {
        return $this->belongsToMany(Bitacora::class);
    }
}
