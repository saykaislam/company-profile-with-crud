<?php

namespace App\Http\Controllers\Admin;

use App\Buyer;
use App\LandOwner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers= Buyer::latest()->get();
        return view('backend.admin.buyers.index',compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.buyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        Toastr::success('Buyer Created Successfully', 'Success');
        return redirect()->route('admin.buyers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buyers = Buyer::find($id);
        return view('backend.admin.buyers.show',compact('buyers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buyers = Buyer::find($id);
        return view('backend.admin.buyers.edit',compact('buyers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $buyers = Buyer::find($id);
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
        Toastr::success('Buyer Updated Successfully', 'Success');
        return redirect ()->route('admin.buyers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buyers = Buyer::find($id);
        $buyers->delete();
        Toastr::success('Buyer deleted Successfully', 'Success');
        return redirect ()->route('admin.buyers.index');

    }
}
