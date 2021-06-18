<?php

namespace App\Http\Controllers\Admin;

use App\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('backend.admin.testimonial.index',compact('testimonials'));
    }

    public function create()
    {
        return view('backend.admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'details'=> 'required',
            'image'=> 'required',
        ]);
        $testimonial = new Testimonial();
        if($request->hasFile('image')){
            $testimonial->image = $request->image->store('uploads/testimonial');
        }
        $testimonial->details = $request->details;
        $testimonial->save();
        Toastr::success('Testimonial successfully Added!');
        return redirect()->route('admin.testimonials.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.admin.testimonial.edit',compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'details'=> 'required',
        ]);
        $testimonial = Testimonial::find($id);
        $testimonial->details = $request->details;
        if($request->hasFile('image')){
            $testimonial->image = $request->image->store('uploads/testimonial');
        }
        $testimonial->save();
        Toastr::success('Testimonial successfully Updated!');
        return redirect()->route('admin.testimonials.index');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        Storage::disk('public')->delete($testimonial->image);
        $testimonial->delete();
        Toastr::success('Testimonial Deleted Successfully', 'Success');
        return redirect()->back();
    }
}
