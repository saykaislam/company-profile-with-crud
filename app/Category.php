<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany('App\Project','category_id');
    }
}
