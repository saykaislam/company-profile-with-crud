<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AwardController extends Controller
{
    public function index(){

        return view('frontend.page.award-publication');
    }
    public function awardDetails(){

        return view('frontend.page.award_details');
    }
}
