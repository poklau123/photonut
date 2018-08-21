<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Overtrue\EasySms\EasySms;
use App\Services\SmsFileGateway;
use App\Services\SmsToastGateway;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sms', function($app){
            $easySms = new EasySms(config('sms'));
            // 注册文件Gateway
            $easySms->extend('smsfilegateway', function($gatewayConfig){
                // $gatewayConfig 来自配置文件里的 `gateways.smsfilegateway`
                return new SmsFileGateway($gatewayConfig);
            });
            // 注册toast Gateway
            $easySms->extend('smstoastgateway', function($gatewayConfig){
                // $gatewayConfig 来自配置文件里的 `gateways.smstoastgateway`
                return new SmsToastGateway($gatewayConfig);
            });

            return $easySms;
        });
    }
}