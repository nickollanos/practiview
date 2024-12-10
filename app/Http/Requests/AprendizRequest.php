<?php

namespace App\Http\Requests;

use App\Models\Usuario;
use Illuminate\Foundation\Http\FormRequest;

class AprendizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method() == 'PUT') {
            return [
                'numero_documento' => 'required|numeric',
                'nombre' => 'required|string',
                'apellido' => 'required|string',
                'tipo_documento_id' => 'required',
                'fecha_nacimiento' => 'required|date',
                'telefono' => 'required',
                'email' => 'required|string|lowercase|email',
                'sexo_id' => 'required',
                'direccion' => 'required|string',
            ];
        }elseif($this->method() == 'PATCH'){
                return[
                    'action' => 'required|string',
                ];
        }else{
        return [
                'numero_documento' => ['required', 'numeric', 'unique:'.Usuario::class],
                'nombre' => ['required', 'string'],
                'apellido' => ['required', 'string'],
                'tipo_documento_id' => ['required'],
                'fecha_nacimiento' => ['required', 'date'],
                'foto_perfil' => ['required', 'image'],
                'telefono' => ['required'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:'.Usuario::class],
                'sexo_id' => ['required'],
                'direccion' => ['required', 'string'],
            ];
        }
    }

    public function message(): array
    {
        return[
            'nombre.required' => 'El nombre es requerido'
        ];
    }

    public function attributes(): array
    {
        return[
            'nombre' => 'Nombre Completo'
        ];
    }
}
