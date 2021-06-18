<?php

namespace App\Http\Controllers\Frontend;

use App\Equipment;
use App\Project;
use App\Service;
use App\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function serviceList() {
        $services = Service::latest()->get();
        return view('frontend.pages.service_list',compact('services'));
    }
    public function serviceDetails($slug) {
        $service = Service::where('slug',$slug)->first();
        $services = Service::latest()->take(3)->get();
        $categories = ServiceCategory::all();
        $equipments = Equipment::all();
        $projects = Project::all();
        return view('frontend.pages.service_details',compact('service','services','categories','equipments','projects'));
    }
}
