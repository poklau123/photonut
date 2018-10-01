<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Storage;

class ContactController extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('contact', ['user' => $user]);
    }

    public function update(Request $request){
        $config_save_path = config('image.pic.save_path');
        $config_save_format = config('image.pic.save_format');
        $config_save_prefix = config('image.pic.prefix');

        $user = Auth::user();
        $user->desc = $request->desc;

        if($request->pic){
            $pic_stream = Image::make($request->pic)->stream($config_save_format);
            $unique_id = uniqid($config_save_prefix);
            Storage::disk('public')->put($config_save_path.$unique_id.'.'.$config_save_format, $pic_stream);
            $user->pic = $unique_id;
        }

        $user->save();

        return redirect()->back()->withInput();
    }
}
