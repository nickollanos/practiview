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
        'sexo_id',
        'estado_id',
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

    //Relationship: un usuario tiene muchos tipo documentos
    public function tipo_documento()
    {
        return $this->hasMany(Tipo_documento::class);
    }

    //Relationship: un usuario tiene muchos sexos
    public function sexo()
    {
        return $this->hasMany(Sexo::class, 'sexo_id');
    }

    //Relationship: muchos usuarios tienen un estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }

    //Relationship:muchos usuarios tienen muchos perfiles
    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class, 'perfil_usuarios', 'usuario_id', 'perfil_id');
    }

    //Relationship: muchos usuario son un admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    //Relationship: muchos usuario son un aprendiz
    public function aprendiz()
    {
        return $this->belongsTo(Aprendiz::class);
    }

    //Relationship: muchos usuario son un instructor
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    //Relationship: muchos usuario son un jefe inmediato
    public function jefe_inmediato()
    {
        return $this->belongsTo(Jefe_Inmediato::class);
    }
}
