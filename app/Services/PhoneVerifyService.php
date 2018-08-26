<?php

namespace App\Services;

use SMS;
use Cache;
use Carbon\Carbon;

class PhoneVerifyService
{
    /**
     * 手机号设置验证码并发送
     *
     * @param string $phone     //手机号
     * @param string $code      //验证码
     * @return bool
     */
    public static function set($phone, $code){
        $expire_minutes = config('phone.expire_minutes');
        $cache_prefix = config('phone.prefix');

        $expireAt = Carbon::now()->addMinutes($expire_minutes);

        Cache::put($cache_prefix.$phone, $code, $expireAt);

        SMS::send($phone, [
            'content'  => 'your verify code is: '.$code.'',
            'template' => 'SMS_001',
            'data' => [
                'code' => $code
            ]
        ]);

        return true;
    }

    /**
     * 获取手机号的验证码
     *
     * @param string $phone     //手机号
     * @return string
     */
    public static function get($phone){
        $cache_prefix = config('phone.prefix');
        $code = Cache::get($cache_prefix.$phone);
        return $code;
    }
}