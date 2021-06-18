<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function projectList() {
        $projectCat = Category::all();
        $projects = Project::all();
        return view('frontend.pages.project_list',compact('projectCat','projects'));
    }
    public function projectDetails($slug) {
        $project = Project::where('slug',$slug)->first();
        $allProjects = Project::all();
        return view('frontend.pages.project_details',compact('project','allProjects'));
    }
}
