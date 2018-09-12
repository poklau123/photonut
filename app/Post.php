<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'pic_uid', 'user_id', 'catalog_id'
    ];
}
