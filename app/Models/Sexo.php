<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'siglas',
        'nombre'
    ];

    //Relationship: muchos sexo tienen un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
