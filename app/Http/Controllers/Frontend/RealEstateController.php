<?php

namespace App\Http\Controllers\Frontend;

use App\Gallery;
use App\RealState;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RealEstateController extends Controller
{
    public function ongoing(){
        $real_projects = RealState::where('status', 'Ongoing')->latest()->get();
        $recent_projects = RealState::where('status', 'Ongoing')->latest()->take(5)->get();
        return view('frontend.page.onGoing', compact('real_projects','recent_projects'));
    }
    public function ongoingDetails($slug){

         $real_project = RealState::where('status', 'Ongoing')->where('slug',$slug)->first();
         $galleries = Gallery::where('real_states_id',$real_project->id)->get();
         return view('frontend.page.single_ongoing',compact('real_project','galleries'));
    }
    public function completed(){
        $real_projects = RealState::where('status', 'Completed')->latest()->paginate(2);
        $recent_projects = RealState::where('status', 'Completed')->latest()->take(5)->get();
        return view('frontend.page.completed', compact('recent_projects','real_projects'));
    }
    public function completedDetails($slug){
        $real_project = RealState::where('status', 'Completed')->where('slug',$slug)->first();
        $galleries = Gallery::where('real_states_id',$real_project->id)->get();
        return view('frontend.page.single_completed',compact('real_project','galleries'));
    }

}
