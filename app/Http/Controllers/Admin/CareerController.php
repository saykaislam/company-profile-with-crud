<?php

namespace App\Http\Controllers\Admin;

use App\Career;
use App\Project;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CareerController extends Controller
{

    public function index()
    {
        $career = Career::latest()->get();
        return view('backend.admin.career.index',compact('career'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.career.create');
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
            'name' =>  'required',
            'email' =>  'required',
            'cv' =>  'required',
            'contact_number' =>  'required',
            'msg' =>  'required',
        ]);

        $career = new Career();
        $career->name = $request->name;
        $career->email = $request->email;
        $career->contact_number = $request->contact_number;
        $career->msg = $request->msg;

        $cv = $request->file('cv');
        $currentDate = Carbon::now()->toDateString();
        $filename = $currentDate . '-' . uniqid() . '.' .$cv->getClientOriginalExtension();
        $destinationPath = 'uploads/career/cv/';
        $cv->move($destinationPath, $filename);
        $career->cv = $filename;

        $career->save();
        Toastr::success('Career form created successfully !');
        return redirect()->route('admin.career.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career = Career::find($id);
        return view('backend.admin.career.show',compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career = Career::find($id);
        return view('backend.admin.career.edit',compact('career'));
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
            'name' =>  'required',
            'email' =>  'required',
            'cv' =>  'required',
            'contact_number' =>  'required',
            'msg' =>  'required',
        ]);

        $career = Career::find($id);
        $career->name = $request->name;
        $career->email = $request->email;
        $career->contact_number = $request->contact_number;
        $career->msg = $request->msg;

        $cv = $request->file('cv');
        $currentDate = Carbon::now()->toDateString();
        $filename = $currentDate . '-' . uniqid() . '.' .$cv->getClientOriginalExtension();
        if (Storage::disk('public')->exists('uploads/career/cv/' . $career->cv)) {
            Storage::disk('public')->delete('uploads/career/cv/' . $career->cv);
        }
        $destinationPath = 'uploads/career/cv/';
        $cv->move($destinationPath, $filename);
        $career->cv = $filename;

        $career->save();
        Toastr::success('Career form Updated successfully !');
        return redirect()->route('admin.career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = Career::find($id);
        //delete old image.....

        Storage::disk('public')->delete('uploads/career/cv/' . $career->cv);

        $career->delete();
        Toastr::success('Career form Deleted Successfully Done!');
        return redirect()->route('admin.career.index');
    }
}
