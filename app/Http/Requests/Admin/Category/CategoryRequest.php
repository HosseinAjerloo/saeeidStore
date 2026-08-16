<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        return [
            'parent_id'   => ['nullable', 'exists:product_groups,id'],
            'name'        => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image'       => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5048'],
            'is_active'   => ['nullable', 'in:0,1'],
        ];
    }
    public function attributes()
    {
        return [
            'is_active'=>'وضعیت گروه',
            'name'=>'نام گروه',
            'description'=>'توضیحات',
            'image'=>'تصویر گروه',
            'parent_id'=>'گروه والد',
        ];
    }
}
