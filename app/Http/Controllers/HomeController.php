<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SMS;
use Cache;

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
        $code = \App\Services\PhoneVerifyService::get('18271681956');
        dd($code);
    }
}
