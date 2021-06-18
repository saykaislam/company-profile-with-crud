<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function galleries()
    {
        return $this->hasMany('App\Gallery', 'project_id');
    }
}
