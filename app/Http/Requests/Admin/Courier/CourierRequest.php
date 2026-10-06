<?php

namespace App\Http\Requests\Admin\Courier;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class CourierRequest extends FormRequest
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
    #[Override]
    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => $this->input('is_active','0') ,
        ]);
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|integer',
            'is_active'=>'required|in:0,1',
            'delivery_business_days'=>'required',
        ];
    }

    #[Override]
    public function attributes()
    {
        return [
            'is_active'=>'وضعیت',
            'delivery_business_days'=>'مدت زمان تحویل سفارش',
            'price'=>'مبلغ پیک'
        ];
    }
}
