<?php

namespace App\Http\Requests;

use App\Rules\DniNifValidationRule;
use App\Rules\TelefonoValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UsuarioRequest extends FormRequest
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
        // Recogemos el id del usuario al que estamos editando
        $id_usuario = request()->route('usuario');
        // Comprobamos si estamos creando un usuario o editando a uno ya existente
        $isCreating = $this->route()->getName() == 'usuarios.store';
        $reglas = [
            'dni' => ['required', 'string', 'size:9', new DniNifValidationRule, 
            // Excluimos al usuario actual al editar usando ignore con el id del usuario.
            $isCreating ? 'unique:users,dni' : Rule::unique('users', 'dni')->ignore($id_usuario),
        ], 
            'email' => ['required', 'string', 'max:255', 'email:rfc,dns', 
            $isCreating ? 'unique:users,email' : Rule::unique('users', 'email')->ignore($id_usuario),
        ],
            'name' => ['required', 'string', 'max:50'],
            'password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), 'string', 'min:8'],
            'telefono' => ['required', 'string', 'size:16', new TelefonoValidationRule],
            'direccion' => ['required', 'string', 'max:150'],
            'rol' => ['required', 'string', 'size:1', 'in:A,O'],
        ];

        return $reglas;
    }

    // meter mensajes si eso
}
