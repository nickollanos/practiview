<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'estado',
        'fecha_cambio',
        'observaciones'
    ];

    //Relationship: muchos sexo tienen un usuario
    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }
}
