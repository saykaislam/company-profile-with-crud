<?php

namespace App\Http\Controllers\Admin;

use App\BlogPost;
use App\Equipment;
use App\Order;
use App\Product;
use App\Project;
use App\RealState;
use App\Service;
use App\Slider;
use App\Staff;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $project=Project::all()->count();
        $service = Service::all()->count();
        $equipment = Equipment::all()->count();
        $realState=RealState::all()->count();
        $slider=Slider::all()->count();
//        $staff=Staff::all()->count();
        $customer = User::where('role_id',2)->count();

         return view('backend.admin.dashboard',compact('project','service','equipment','realState','slider','customer'));
    }
}
