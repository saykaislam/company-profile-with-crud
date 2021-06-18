<?php

namespace App\Http\Controllers\Frontend;

use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index(){

        $architecture = Staff::where('designation','Architecture')->get();
        $engineering = Staff::where('designation','Engineering')->get();
        $administrations = Staff::where('designation','Administration')->get();
        return view('frontend.page.staff',compact('architecture','administrations','engineering'));
    }
}
