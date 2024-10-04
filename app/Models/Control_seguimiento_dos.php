<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control_seguimiento_dos extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo',
        'periodo_a',
        'periodo_b',
        'observaciones',
        'evaluacion',
        'juicio_evaluacion'
    ];
}
