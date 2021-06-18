<?php

namespace App\Http\Controllers\Frontend;



use App\BlogPost;
use App\Category;
use App\Client;
use App\Gallery;
use App\Project;
use App\RealState;
use App\Service;
use App\Slider;
use App\Staff;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function Index()

    {
        $sliders = Slider::latest()->get();
        $projectCat = Category::latest()->get();
        $projects = Project::latest()->get();
        $services = Service::latest()->take(3)->get();
        $clients = Client::latest()->get();
        $testimonials = Testimonial::latest()->get();

        return view('frontend.index',compact('sliders','projects','projectCat','services','clients','testimonials'));
    }
    public function gallery() {
        $galleries = Gallery::latest()->get();
        return view('frontend.pages.gallery',compact('galleries'));
    }
}
