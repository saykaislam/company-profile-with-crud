<?php

namespace App\Http\Controllers\Admin;

use App\Staff;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();

        return view('backend.admin.staff.index',compact('staffs'));
    }

    public function create()
    {
        return view('backend.admin.staff.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'image'=> 'required',
            'designation_title'=> 'required',
        ]);
        $staffs = new Staff();
        $staffs->name = $request->name;
        $staffs->email = $request->email;
        $staffs->designation = $request->designation;
        $staffs->designation_title = $request->designation_title;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for staff and upload
            $proImage = Image::make($image)->resize(600, 600)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/staff/' . $image_name, $proImage);

        }
        else {
            $image_name = "default.png";
        }
        $staffs->image = $image_name;


        $staffs->save();
        Toastr::success('Staff Created Successfully', 'Success');
        return redirect()->route('admin.staff.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $staffs = Staff::find($id);
        return view('backend.admin.staff.edit',compact('staffs'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required',
            'email'=> 'required',
            'designation_title'=> 'required',
        ]);
        $staffs = Staff::find($id);
        $staffs->name = $request->name;
        $staffs->email = $request->email;
        $staffs->designation = $request->designation;
        $staffs->designation_title = $request->designation_title;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/staff/'. $staffs->image)) {
                Storage::disk('public')->delete('uploads/staff/'. $staffs->image);
            }
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for staff and upload
            $proImage = Image::make($image)->resize(600, 600)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/staff/' . $image_name, $proImage);

        }
        else {
            $image_name = $staffs->image ;
        }
        $staffs->image = $image_name;

        $staffs->save();
        Toastr::success('Staff Created Successfully', 'Success');
        return redirect()->route('admin.staff.index');
    }

    public function destroy($id)
    {
        $staffs = Staff::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/staff/'.$staffs->image);

        $staffs->delete();
        Toastr::success('Project Deleted Successfully Done!');
        return redirect()->route('admin.staff.index');
    }
}
