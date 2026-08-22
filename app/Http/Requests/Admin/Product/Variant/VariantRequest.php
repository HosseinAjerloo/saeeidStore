<?php

namespace App\Http\Requests\Admin\Product\Variant;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VariantRequest extends FormRequest
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
            'variants'=>['array','required'],
            'variants.*.attributes'=>['array','required'],
            'variants.*.attributes.*.attribute_id'=>['required','exists:attributes,id'],
            'variants.*.attributes.*.attribute_value_id'=>['required','exists:attribute_values,id'],
            'variants.*.sku'=>['required','string'],
            'variants.*.price'=>['required','min:10000','numeric'],
            'variants.*.stock'=>['required','min:1','integer'],
            'variants.*.is_active'=>['sometimes','in:1'],
        ];
    }
    public function attributes(): array
    {
        return [
            'variants' => 'تنوع‌ها',
            'variants.*.attributes' => 'ویژگی‌ها',
            'variants.*.attributes.attribute_id' => 'شناسه ویژگی',
            'variants.*.attributes.attribute_value_id' => 'مقدار ویژگی',
            'variants.*.sku' => 'کد SKU',
            'variants.*.price' => 'قیمت',
            'variants.*.stock' => 'موجودی',
            'variants.*.is_active' => 'وضعیت',
        ];
    }
    public function messages()
    {
        return [
            'variants.*.price.numeric'=>'قیمت کالا باید از نوع عددی باشد',
            'variants.*.stock.integer'=>'نعداد کالا باید از نوع عددی باشد'
        ];
    }
}
