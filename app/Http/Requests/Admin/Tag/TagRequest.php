<?php

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'is_active'=>request()->input('is_active','0')
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'is_active'=>'required|in:1,0'
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'نام تگ',
            'is_active'=>'وضعیت تگ'
        ];
    }
}
