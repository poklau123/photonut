<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function test(){
        $sms = App::make('sms');
        $data = $sms->send(13188888888, [
            'content'  => 'your verify code is: 6379',
            'template' => 'SMS_001',
            'data' => [
                'code' => 6379
            ]
        ]);

        return $data;
    }
}
