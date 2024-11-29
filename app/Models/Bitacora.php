<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
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

    //Relationship: muchas bitacoras tienen una practica
    public function practica()
    {
        return $this->belongsTo(Practica::class);
    }

    //Relationship: muchas bitacoras componen un control y seguimiento
    public function seguimiento()
    {
        return $this->belongsTo(Seguimiento::class);
    }
}
