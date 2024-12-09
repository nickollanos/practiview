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
        'tipo_documento_id',
        'numero_documento',
        'fecha_nacimiento',
        'telefono',
        'email',
        'sexo_id',
        'estado_id',
        'direccion',
        'password',
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
        return $this->hasMany(Tipo_documento::class, 'id', 'tipo_documento_id');
    }

    //Relationship: un usuario tiene muchos sexos
    public function sexo()
    {
        return $this->hasMany(Sexo::class, 'id', 'sexo_id');
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
        return $this->hasOne(Aprendiz::class, 'usuario_id', 'id');
    }

    //Relationship: muchos usuario son un instructor
    // En Usuario.php
    public function instructor()
    {
        return $this->hasOne(Instructor::class, 'usuario_id', 'id');
    }


    //Relationship: muchos usuario son un jefe inmediato
    public function jefe_inmediato()
    {
        return $this->belongsTo(Jefe_Inmediato::class);
    }

    public function scopeNames($query, $q)
    {
        if (trim($q)) {
            $query->where('nombre', 'LIKE', "%$q%");
        }
    }
    /**
     * Scope para filtrar usuarios administradores.
     */
    public function scopeAdmin($query)
    {
        return $query->whereHas('perfiles', function ($q) {
            $q->where('perfil', 'administrador');
        });
    }
    /**
     * Scope para filtrar usuarios aprendices.
     */
    public function scopeAprendiz($query)
    {
        return $query->whereHas('perfiles', function ($q) {
            $q->where('perfil', 'aprendiz');
        });
    }
    /**
     * Scope para filtrar usuarios intructores.
     */
    public function scopeInstructor($query)
    {
        return $query->whereHas('perfiles', function ($q) {
            $q->where('perfil', 'instructor');
        });
    }
}
