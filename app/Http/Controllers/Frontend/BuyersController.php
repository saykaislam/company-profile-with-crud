<?php

namespace App\Http\Controllers\Frontend;

use App\Buyer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyersController extends Controller
{
    public function index()
    {
        return view('frontend.page.buyers');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'preferred_location' => 'required',
            'preferred_size' => 'required',
            'car_parking' => 'required',
            'expected_handover_date' => 'required',
            'facing_apartment' => 'required',
            'preferred_floor' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
        ]);

        $buyers = new Buyer();
        $buyers->name = $request->name;
        $buyers->email = $request->email;
        $buyers->profession = $request->profession;
        $buyers->mobile_number = $request->mobile_number;
        $buyers->address = $request->address;
        $buyers->preferred_location = $request->preferred_location;
        $buyers->preferred_size = $request->preferred_size;
        $buyers->car_parking = $request->car_parking;
        $buyers->expected_handover_date = $request->expected_handover_date;
        $buyers->facing_apartment = $request->facing_apartment;
        $buyers->preferred_floor = $request->preferred_floor;
        $buyers->bedroom = $request->bedroom;
        $buyers->bathroom = $request->bathroom;

        $buyers->save();
        Toastr::success('Your Request Send Successfully', 'Success');
        return redirect()->back();


    }
}
