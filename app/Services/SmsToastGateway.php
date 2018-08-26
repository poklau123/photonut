<?php

/*
 * This file is part of the overtrue/easy-sms.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Services;

use Overtrue\EasySms\Gateways\Gateway;
use Overtrue\EasySms\Contracts\MessageInterface;
use Overtrue\EasySms\Contracts\PhoneNumberInterface;
use Overtrue\EasySms\Exceptions\GatewayErrorException;
use Overtrue\EasySms\Support\Config;
use Overtrue\EasySms\Traits\HasHttpRequest;
use Log;

/**
 * Class SmsToastGateway.
 */
class SmsToastGateway extends Gateway
{
    use HasHttpRequest;
    /**
     * @param \Overtrue\EasySms\Contracts\PhoneNumberInterface $to
     * @param \Overtrue\EasySms\Contracts\MessageInterface     $message
     * @param \Overtrue\EasySms\Support\Config                 $config
     *
     * @return array
     */
    public function send(PhoneNumberInterface $to, MessageInterface $message, Config $config)
    {
        if (!is_array($to)) {
            $to = [$to];
        }

        $api = $config->get('api');
        foreach($to as $item){
            $result = $this->get($api, [
                'phone' => $item->getNumber(),
                'verifycode' => $message->getContent()
            ]);
            Log::info([
                'phone' => $item->getNumber(),
                'verifycode' => $message->getContent()
            ]);
            if($result['code'] !== 0){
                Log::info($result);
                throw new GatewayErrorException($item, $result['code'], $result);
            }
        }

        return compact('status', 'success');
    }
}
