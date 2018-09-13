<?php

namespace App\Http\Controllers;

use App\Catalog;
use Illuminate\Http\Request;
use Auth;
use DB;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->catalogs()->orderBy('sort', 'asc')->select('id', 'name', 'sort')->get();
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ] ,[] ,[
            'name' => '目录名'
        ]);

        if(Auth::user()->catalogs()->exists()){
            $sort = Auth::user()->catalogs()->max('sort') + 1;
        }else{
            $sort = 0;
        }

        $catalog = Catalog::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'sort' => $sort
        ]);

        return $catalog;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        $request->validate([
            'name' => 'string',
            'move_up' => 'boolean',
            'move_down' => 'boolean'
        ] ,[] ,[
            'name' => '目录名',
            'move_up' => '上移操作',
            'move_down' => '下移操作'
        ]);

        if($request->name){
            $catalog->name = $request->name;
            $catalog->save();
        }else{
            if($request->move_up){
                if($catalog->sort > 0){
                    $catalog->sort -= 1;
                    Auth::user()->catalogs()->where('sort', $catalog->sort)->increment('sort', 1);
                }
            }else if($request->move_down){
                if($catalog->sort < Auth::user()->catalogs()->max('sort')){
                    $catalog->sort += 1;
                    Auth::user()->catalogs()->where('sort', $catalog->sort)->decrement('sort', 1);
                }
            }
            $catalog->save();
        }

        return $catalog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        Auth::user()->catalogs()->where('sort', '>', $catalog->sort)->decrement('sort', 1);
        $catalog->delete();

        $pic_uids = $catalog->posts()->get()->pluck('pic_uid')->all();
        PostController::DeletePicStorage($pic_uids);

        return [];
    }
}
