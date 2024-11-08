<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
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

    //Relationship: muchos roles tienen muchos instructores
    public function instructor()
    {
        return $this->belongsToMany(Instructor::class, 'instructor_rol');
    }
}
