<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasRole('Admin') ?? false;
    }

    public function rules(): array
    {
        return [
            'name'      => ['required','string','max:120'],
            'email'     => ['required','email:rfc,dns','unique:users,email'],
            'password'  => ['required','string','min:8'], // agrega "confirmed" si envías password_confirmation
            'phone'     => ['nullable','string','max:40'],
            'is_active' => ['boolean'],
            // por ahora solo Admin; si no envían, no asigna nada extra
            'role'      => ['nullable','in:Admin'],
        ];
    }
}
