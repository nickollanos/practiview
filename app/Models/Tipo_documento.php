<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo',
        'siglas',
        'detalle'
    ];

    //Relationship: muchos tipo documento tienen un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }



}
