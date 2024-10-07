<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipodocumentos extends Model
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
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class);
    }



}
