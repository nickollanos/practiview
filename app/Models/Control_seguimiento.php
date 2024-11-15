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
        'lugar',
        'bitacora_id'
    ];

    //Relationship: un control y seguimiento tiene muchas bitacoras
    public function bitacora()
    {
        return $this->hasMany(Bitacora::class);
    }
}
