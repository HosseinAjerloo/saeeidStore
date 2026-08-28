<?php

namespace App\Http\Requests\Admin\Discount;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function prepareForValidation()
    {

        return $this->merge([
            'starts_at'=>substr(request()->input('starts_at'),0,10),
            'expires_at'=>substr(request()->input('expires_at'),0,10),
            'is_active'=>request()->input('is_active',0),
            'min_order_amount' => request()->filled('min_order_amount') ? request()->input('min_order_amount')  : null,
            'max_order_amount' => request()->filled('max_order_amount') ? request()->input('max_order_amount')  : null,
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
            'type'=>'required|in:percentage,fixed',
            'value'=>'required|numeric|min:1',
            'scope'=>'required|in:user,product',
            'is_active'=>'required|in:0,1',
            'min_order_amount'=>'nullable|numeric|min:10000',
            'max_order_amount'=>'nullable|numeric|min:10000',
            'starts_at'=>'required|min:10|max:10|string',
            'expires_at'=>'required|min:10|max:10|string|gte:starts_at',
            'connection'=>['required','array'],
            'connection.*'=>['required', 'exists:' . (request()->input('scope') === 'user' ? 'users' : 'products') . ',id']
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'عنوان تخفیف',
            'type'=>'نوع تخفیف',
            'value'=>'مقدار تخفیف',
            'scope'=>'دامنه تخفیف',
            'is_active'=>'وضعیت تخفیف',
            'min_order_amount'=>'حداقل مبلغ سفارش',
            'max_order_amount'=>'حداکثر مبلغ سفارش',
            'starts_at'=>'زمان شروع',
            'expires_at'=>'زمان پایان',
        ];
    }
    public function messages()
    {
        return [
            'expires_at.gt'=>'زمان پایان تاریخ باید بزرگ تر یا برابر زمان شروع باشد'
        ];
    }
}
