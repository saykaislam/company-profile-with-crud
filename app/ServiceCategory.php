<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $guarded = [];

    public function service()
    {
        return $this->hasMany('App\Service','category_id');
    }
}
