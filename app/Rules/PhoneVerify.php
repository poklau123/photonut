<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Services\PhoneVerifyService;
use Log;

class PhoneVerify implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $store_code = PhoneVerifyService::get($this->phone);
        Log::info([$store_code, $value]);
        return $value == $store_code;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '手机验证码不匹配';
    }
}
