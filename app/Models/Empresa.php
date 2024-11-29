<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'numero_nit',
        'telefono',
        'direccion',
        'zona_id',
        'email',
        'estado_id'
    ];

    //Relationship: muchas empresas tienen un estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }


    //Relationship: una empresa tiene muchos jefe inmediato
    public function jefe_inmediato()
    {
        return $this->hasMany(Jefe_Inmediato::class);
    }

    //Relationship: muchas empresas tienen una zona
    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

}
