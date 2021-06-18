<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = [];

    public function posts()
    {
        return $this->hasMany('App\BlogPost','blog_category_id');
    }

}
