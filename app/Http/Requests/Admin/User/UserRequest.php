<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\NationalCode;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_active' => request()->input('is_active', '0')
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = Route::current()->parameter('user')?->id;
        return [
            'name' => ['required', 'string', 'max:100'],
            'family' => ['required', 'string', 'max:100'],
            'mobile' => ['required', 'string', 'regex:/^09\d{9}$/', 'unique:users,mobile,' . $userId],
            'phone' => ['nullable', 'string', 'max:20'],
            'type'=>'required|in:admin,customer',
            'national_id_number' => [
                'required',
                'digits:10',
                'unique:users,national_id_number,' . $userId,
                new NationalCode()
            ],
            'is_active' => ['nullable', 'in:1,0'],
            'email' => ['nullable', 'email', 'max:255', 'unique:users,email,' . $userId],
            'gender' => ['required', 'in:male,female'],
            'password' => ['required', 'string', 'min:8'],
            'phone_verified_at' => ['nullable', 'date'],
            'email_verified_at' => ['nullable', 'date'],
            'date_of_birth' => ['required', 'max:13'],
        ];
    }

    public function attributes()
    {
        return ['is_active' => 'وضعیت حساب', 'date_of_birth' => 'تاریخ تولد','type'=>'نوع کاربر'];
    }
}
