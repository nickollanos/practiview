<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
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

    //Relationship: una zona tiene muchas empresas
    public function empresa()
    {
        return $this->hasMany(Empresa::class);
    }
}
