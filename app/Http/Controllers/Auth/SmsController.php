<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Rules\PhoneValid;
use SMS;
use App\Services\PhoneVerifyService;
use Validator;

class SmsController extends Controller
{
    public function requestCode(Request $request){
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'unique:users', new PhoneValid]
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $code = mt_rand(1000, 9999);

        PhoneVerifyService::set($request->phone, $code);

        $wait_time = config('phone.wait_time');

        return redirect()->back()->with(['wait_time' => $wait_time])->withInput();
    }
}
