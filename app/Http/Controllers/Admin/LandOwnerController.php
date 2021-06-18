<?php

namespace App\Http\Controllers\Admin;



use App\LandOwner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class LandOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landOwner = LandOwner::latest()->get();
        return view('backend.admin.LandOwner.index',compact('landOwner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.LandOwner.create');
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
        Toastr::success('Land Owner Created Successfully', 'Success');
        return redirect()->route('admin.land_owner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $landOwner = LandOwner::find($id);
        return view('backend.admin.LandOwner.show',compact('landOwner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $landOwner = LandOwner::find($id);
        return view('backend.admin.LandOwner.edit',compact('landOwner'));
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

        $landOwner = LandOwner::find($id);
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
        Toastr::success('Land Owner Updated Successfully', 'Success');
        return redirect()->route('admin.land_owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LandOwner::destroy($id);
        Toastr::success('Land Owner Deleted Successfully','Success');
        return  redirect()->route("admin.land_owner.index");
    }
}
