<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'tipo_documento_id',
        'numero_documento',
        'fecha_nacimiento',
        'telefono',
        'email',
        'sexo',
        'direccion',
        'password',
        'firma',
        'foto_perfil'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //Relationship: un usuario tiene muchos tipo documento
    public function tipo_documento()
    {
        return $this->hasMany(Tipo_documento::class);
    }

    //Relationship: un usuario tiene muchos sexo
    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    //Relationship: un usuario tiene muchos sexo
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    //Relationship: muchos usuario tiene muchos perfil
    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'perfil_usuario');
    }
}
