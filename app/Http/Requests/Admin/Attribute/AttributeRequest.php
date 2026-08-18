<?php

namespace App\Http\Requests\Admin\Attribute;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
        $values = $this->input('values', []);

        $values = array_map(function ($item) {
            if (!isset($item['is_active'])) {
                $item['is_active'] = '0';
            }

            return $item;
        }, $values);
        $this->merge([
            'is_active' => $this->input('is_active', '0'),
            'values' => $values,
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
            'type' => 'required|in:normal,color',
            'name' => 'required',
            'is_active' => 'required|in:1,0',
            'values' => ['required', 'array', 'min:1'],
            'values.*.value' => 'required',
            'values.*.is_active' => 'required|in:0,1',
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'نوع ویژگی',
            'name' => 'نام ویژگی',
            'is_active' => 'وضعیت ویژگی',
            'values.*.value' => 'مقدار ویژگی',
            'values.*.is_active' => 'وضعیت مقدار ویژگی',
        ];
    }
}
