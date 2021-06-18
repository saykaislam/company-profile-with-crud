<?php

namespace App\Http\Controllers\Frontend;

use App\Client;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.pages.about_us');
    }
    public function grihayon(){
        return view('frontend.pages.grihayon');
    }
    public function Clients()
    {
        $clients = Client::all();
        return view('frontend.page.clients',compact('clients'));
    }
    public function team() {
        $teams = Staff::all();
        return view('frontend.pages.team',compact('teams'));
    }

}
