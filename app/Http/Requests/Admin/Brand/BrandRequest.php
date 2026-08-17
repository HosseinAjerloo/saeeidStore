<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class BrandRequest extends FormRequest
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

    public function prepareForValidation()
    {
        $this->merge([
            'is_active' => request()->input('is_active', '0')
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'logo'=>[Route::current()->getName()=='admin.brand.create'?'required':'nullable','image', 'mimes:jpeg,png,jpg,webp', 'max:5048'],
            'website'=>['nullable','url'],
            'is_active' => ['nullable', 'in:0,1'],

        ];
    }
    public function attributes()
    {
        return [
            'is_active' => 'وضعیت برند',
            'name' => 'نام برند',
            'description' => 'توضیحات',
            'logo' => 'تصویر گروه',
            'website'=>'ادرس وب برند'
        ];
    }
}
