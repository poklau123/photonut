<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Image;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function info(){
        return Auth::user();
    }

    public function setAvatar(Request $request){
        $request->validate([
            'avatar' => 'required|image'
        ], [], [
            'avatar' => '头像'
        ]);

        $config_avatar_width = config('image.avatar.width');
        $config_avatar_height = config('image.avatar.height');
        $config_avatar_save_path = config('image.avatar.save_path');
        $config_avatar_save_format = config('image.avatar.save_format');

        $user = Auth::user();

        $avatar = Image::make($request->avatar)->fit($config_avatar_width, $config_avatar_height);
        Storage::disk('public')->put($config_avatar_save_path.$user->id.'.'.$config_avatar_save_format, $avatar->stream($config_avatar_save_format));

        $user->avatar = Carbon::now()->timestamp;
        $user->save();

        return $user;
    }
}
