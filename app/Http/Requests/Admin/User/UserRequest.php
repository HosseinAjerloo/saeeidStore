<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\NationalCode;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],

            'family' => ['required', 'string', 'max:100'],

            'mobile' => ['required', 'string', 'regex:/^09\d{9}$/', 'unique:users,mobile'],

            'phone' => ['nullable', 'string', 'max:20'],

            'national_id_number' => [
                'required',
                'digits:10',
                'unique:users,national_id_number',
                new NationalCode()
            ],

            'is_active' => ['required', 'boolean'],

            'email' => ['nullable', 'email', 'max:255', 'unique:users,email'],

            'gender' => ['required', 'in:male,female'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'phone_verified_at' => ['nullable', 'date'],

            'email_verified_at' => ['nullable', 'date'],

            'date_of_birth' => ['nullable', 'date'],
        ];
    }
}
