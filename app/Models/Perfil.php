<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'perfil'
    ];

    //Relationship: muchos perfiles tienen muchos usuarios
    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'perfil_usuarios', 'perfil_id', 'usuario_id');
    }
}
