<?php

namespace App\Http\Requests\Panel\Cart;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
 public function prepareForValidation(): void
    {
        $this->merge([
            'variant_attribute_ids' => $this->input('variant_attribute_ids', null),
        ]);
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
             Response::json(['errors'=>$validator->errors()],422)
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'variant_attribute_ids' => 'nullable|exists:attribute_values,id',
            'productVariant' => 'required|exists:product_variants,id'
        ];
    }

    public function attributes()
    {
        return [
            'selectedColor' => 'رنگ محصول',
            'productVariant' => 'محصول'
        ];
    }
}
