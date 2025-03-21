<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'], // Nuevo campo
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'status' => ['required', 'in:activo,inactivo'], // Nuevo campo
            'direccion' => ['nullable', 'string', 'max:255'], // Nuevo campo
            'fotoperfil' => ['nullable', 'string', 'max:255'], // Nuevo campo
            'telefono' => ['nullable', 'string', 'max:15'], // Nuevo campo
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'apellido' => $input['apellido'], // Nuevo campo
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'status' => $input['status'], // Nuevo campo
            'direccion' => $input['direccion'] ?? null, // Nuevo campo
            'fotoperfil' => $input['fotoperfil'] ?? null, // Nuevo campo
            'telefono' => $input['telefono'] ?? null, // Nuevo campo
        ]);
    }
}
