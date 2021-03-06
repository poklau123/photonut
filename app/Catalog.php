<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
        'user_id', 'name', 'sort'
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }
}
