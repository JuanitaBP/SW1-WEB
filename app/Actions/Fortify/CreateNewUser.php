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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'name2' => $input['name2'],
            'apellido' => $input['apellido'],
            'ci' => $input['ci'],
            'numero1' => $input['numero1'],
            'numero2' => $input['numero2'],
            'ciudadci' => $input['ciudadci'],
            'email' => $input['email'],
            'verificacion' => $input['verificacion'],
            'email_verified_at' => $input['email_verified_at'],
            'current_team_id' => $input['current_team_id'],
            'profile_photo_path' => $input['profile_photo_path'],
            'estado' => $input['estado'],
            'password' => Hash::make($input['password']),
        ]);




    }
}
