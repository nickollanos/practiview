<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'id_municipio'
    ];

    //Relationship: un departamento tiene muchos municipios
    public function municipio()
    {
        return $this->hasMany(Municipio::class);
    }

    //Relationship: un departamento tienen mucho regional
    public function regional()
    {
        return $this->hasMany(Regional::class);
    }


}

