<?php

namespace App\Http\Requests\Panel\User\Profile;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class AddressRequest extends FormRequest
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
            "name" => "required|string",
            "family" => "required|string",
            "phone_number" => "required|regex:/^09\d{9}$/",
            "number" => "required",
            "province_id" => "required|exists:provinces,id",
            "city_id" => "required|exists:cities,id",
            "full_address" => "required|string",
            "postal_code" => "required|digits:10",
            "house_number" => "required|integer",
            'default_address' => 'sometimes|in:on'
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()
                ->route('panel.profile.address')
                ->with(['error'=>'لطفاً اطلاعات واردشده را به‌درستی بررسی و اصلاح کنید.'])->withErrors($validator)
                ->withInput()
        );
    }
    public function messages(): array
    {
        return [
            "name.required" => "وارد کردن نام الزامی است.",
            "name.string" => "نام باید به صورت متنی باشد.",

            "family.required" => "وارد کردن نام خانوادگی الزامی است.",
            "family.string" => "نام خانوادگی باید به صورت متنی باشد.",

            "phone_number.required" => "وارد کردن شماره موبایل الزامی است.",
            "phone_number.regex" => "شماره موبایل وارد شده معتبر نیست.",

            "number.required" => "وارد کردن تلفن ثابت الزامی است.",

            "province_id.required" => "انتخاب استان الزامی است.",
            "province_id.exists" => "استان انتخاب شده معتبر نیست.",

            "city_id.required" => "انتخاب شهر الزامی است.",
            "city_id.exists" => "شهر انتخاب شده معتبر نیست.",

            "full_address.required" => "وارد کردن آدرس کامل الزامی است.",
            "full_address.string" => "آدرس باید به صورت متنی باشد.",

            "postal_code.required" => "وارد کردن کد پستی الزامی است.",
            "postal_code.digits" => "کد پستی باید ۱۰ رقم باشد.",

            "house_number.required" => "وارد کردن کد پلاک الزامی است.",
            "house_number.integer" => "پلاک باید از نوع عددی باشد",
        ];
    }
}
