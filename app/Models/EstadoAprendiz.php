<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoAprendiz extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre'
    ];

    //Relationship: un estado tiene muchos aprendices
    public function aprendiz()
    {
        return $this->hasMany(Aprendiz::class);
    }

}
