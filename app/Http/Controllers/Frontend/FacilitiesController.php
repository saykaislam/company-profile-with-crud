<?php

namespace App\Http\Controllers\Frontend;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilitiesController extends Controller
{
    public function facilities()
    {
        $facilities =Client::latest()->get();
        return view('frontend.page.facilities',compact('facilities'));
    }
}
