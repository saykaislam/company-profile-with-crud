<?php

namespace App\Http\Controllers\Frontend;

use App\Career;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index(){
        return view('frontend.page.career');
    }
    public function store(Request $request){
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
        $filename = $currentDate.'-' . uniqid(). '.' .$cv->getClientOriginalExtension($career->cv );
        if (Storage::disk('public')->exists('uploads/career/cv/' . $career->cv)) {
            Storage::disk('public')->delete('uploads/career/cv/' . $career->cv);
        }
        $destinationPath = 'uploads/career/cv/';
        $cv->move($destinationPath, $filename);
        $career->cv = $filename;

        $career->save();
        Toastr::success('Your Request Send successfully !');
        return redirect()->back();

    }
}
