<?php

namespace App\Http\Controllers\Frontend;

use App\LandOwner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandOwnerController extends Controller
{
    public function index(){
        return view('frontend.page.landOwner');
    }
    public function store(Request $request)

    {
        $this->validate($request, [
            'name' => 'required',
            'contact_person' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'locality' => 'required',
            'size_of_land' => 'required',
            'width_of_road_front' => 'required',
            'category_of_land' => 'required',
            'facing' => 'required',
            'attractive_features' => 'required',
        ]);

        $landOwner = new LandOwner();
        $landOwner->name = $request->name;
        $landOwner->email = $request->email;
        $landOwner->contact_person = $request->contact_person;
        $landOwner->mobile_number = $request->mobile_number;
        $landOwner->address = $request->address;
        $landOwner->locality = $request->locality;
        $landOwner->size_of_land = $request->size_of_land;
        $landOwner->width_of_road_front = $request->width_of_road_front;
        $landOwner->category_of_land = $request->category_of_land;
        $landOwner->facing = $request->facing;
        $landOwner->attractive_features = $request->attractive_features;


        $landOwner->save();
        Toastr::success('Your Request Send Successfully', 'Success');
        return redirect()->back();

    }
}
