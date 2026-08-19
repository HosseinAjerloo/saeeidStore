<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ProductRequest extends FormRequest
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
            'is_active' => request()->input('is_active', '0'),
            'is_featured' => request()->input('is_active', '0'),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'brand_id' => 'required|exists:product_brands,id',
            'group_id' => 'required|exists:product_groups,id',
            'short_description' => 'required|max:500|string',
            'description' => 'required',
            'is_active' => 'required|in:0,1',
            'is_featured' => 'required|in:0,1',
            'image' => [Route::current()->getName() == 'admin.product.store' ? 'required' : 'nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5048'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'نام محصول',
            'brand_id' => 'برند محصول',
            'category_id' => 'دسته بندی محصول',
            'short_description' => 'توضیحات کوتاه محصول',
            'description' => 'توضیحات محصول',
            'is_active' => 'وضعیت محصول',
            'image' => 'عکس محصول'
        ];
    }
}
