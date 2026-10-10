<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    #[Override]
    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->input('is_active', 'inactive'),
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
            'group_id' => 'required|exists:product_groups,id',
            'title' => 'required|min:3',
            'description' => ' required|min:3',
            'is_active' => 'required:in:active,inactive',
            'image' => 'file|required|mimes:png,jpg,jpeg|max:5120'
        ];
    }
    #[Override]
    public function attributes()
    {
        return [
            'group_id' => 'دسته بندی',
            'title' => ' عنوان',
            'description' => ' توضیحات',
            'is_active' => 'وضعیت',
        ];
    }
}
