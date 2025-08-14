<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasRole('Admin') ?? false;
    }

    public function rules(): array
    {
        /** @var User $record */
        $record = $this->route('user'); // route-model binding

        return [
            'name'      => ['sometimes','required','string','max:120'],
            'email'     => ['sometimes','required','email:rfc,dns','unique:users,email,'.$record->id],
            'password'  => ['nullable','string','min:8'],
            'phone'     => ['nullable','string','max:40'],
            'is_active' => ['boolean'],
            'role'      => ['nullable','in:Admin'],
        ];
    }
}
