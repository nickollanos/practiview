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

    //Relationship: muchos perfil tiene muchos usuario
    public function Perfiles()
    {
        return $this->belongsToMany(Perfil::class);
    }
}
