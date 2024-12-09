<?php

namespace App\Http\Requests;

use App\Models\Empresa;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
                'numero_nit' => 'required|numeric',
                'nombre' => 'required|string',
                'zona_id' => 'required',
                'telefono' => 'required',
                'email' => 'required|string|lowercase|email',
                'direccion' => 'required|string',
            ];
        }else{
        return [
                'numero_nit' => ['required', 'numeric', 'unique:'.Empresa::class],
                'nombre' => ['required', 'string'],
                'zona_id' => ['required'],
                'estado_id' => ['required'],
                'telefono' => ['required'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:'.Empresa::class],
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
