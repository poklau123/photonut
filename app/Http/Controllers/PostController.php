<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use Image;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($catalog_id)
    {
        $config_meta_format = config('image.meta.format');
        $config_meta_save_path = config('image.meta.save_path');
        $config_meta_compress_path = config('image.meta.compress_path');
        $config_meta_prefix = config('image.meta.prefix');

        return Auth::user()->posts()->where('catalog_id', $catalog_id)->get()->map(function($item) use($config_meta_compress_path, $config_meta_save_path, $config_meta_format, $config_meta_prefix){
            $origin_url = asset('storage'.$config_meta_save_path.$item->pic_uid.'.'.$config_meta_format);
            $compress_url = asset('storage'.$config_meta_compress_path.$item->pic_uid.'.'.$config_meta_format);
            return [
                'title' => $item->title,
                'compress_url' => $compress_url,
                'origin_url' => $origin_url,
                'created_at' => $item->created_at->format('Y-m-d')
            ];
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $catalog_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'pic' => 'required|image'
        ]);

        $config_max_width = config('image.compress.max_width');
        $config_max_height = config('image.compress.max_height');

        $config_meta_format = config('image.meta.format');
        $config_meta_save_path = config('image.meta.save_path');
        $config_meta_compress_path = config('image.meta.compress_path');
        $config_meta_prefix = config('image.meta.prefix');

        $user_id = Auth::user()->id;
        $pic_uniqueid = uniqid($config_meta_prefix);

        $pic = Image::make($request->pic);
        $compress_pic = Image::make($request->pic)->fit($config_max_width, $config_max_height);

        Storage::disk('public')->put($config_meta_save_path.$pic_uniqueid.'.'.$config_meta_format, $pic->stream($config_meta_format));
        Storage::disk('public')->put($config_meta_compress_path.$pic_uniqueid.'.'.$config_meta_format, $compress_pic->stream($config_meta_format));

        $post = Post::create([
            'title' => $request->title,
            'pic_uid' => $pic_uniqueid,
            'catalog_id' => $catalog_id,
            'user_id' => $user_id
        ]);
        
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $config_meta_format = config('image.meta.format');
        $config_meta_save_path = config('image.meta.save_path');
        $config_meta_compress_path = config('image.meta.compress_path');
        $config_meta_prefix = config('image.meta.prefix');

        $pic_uniqueid = $post->pic_uid;
        Storage::delete([$config_meta_save_path.$pic_uniqueid.'.'.$config_meta_format, $config_meta_compress_path.$pic_uniqueid.'.'.$config_meta_format]);

        $post->delete();
        return [];
    }
}
