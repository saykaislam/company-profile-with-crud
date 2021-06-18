<?php

namespace App\Http\Controllers\Frontend;

use App\Equipment;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
{
    public function equipmentList() {
        $equipments = Equipment::all();
        return view('frontend.pages.equipment_list',compact('equipments'));
    }
    public function equipmentDetails($slug) {
        $equipment = Equipment::where('slug',$slug)->first();
        $projects = Project::all();
        return view('frontend.pages.equipment_details',compact('equipment','projects'));
    }
}
