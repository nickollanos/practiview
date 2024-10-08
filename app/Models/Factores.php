<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factores extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'variables',
        'descripcion',
        'valoracion',
        'observacion'
    ];

    //Relationship: muchas factores tiene muchas control_seguimiento
    public function control_seguimiento()
    {
        return $this->belongsToMany(Control_seguimiento::class);
    }
}
