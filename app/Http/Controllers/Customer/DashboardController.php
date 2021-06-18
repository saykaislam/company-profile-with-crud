<?php

namespace App\Http\Controllers\Customer;

use App\CustomerImage;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        $user = User::findOrFail(Auth::id());
        $customer_images = CustomerImage::where('customer_id',$user->id)->where('type','image')->get();
        return view('frontend.customer.dashboard',compact('customer_images'));
    }
    public function video_link()
    {
        $video_links = CustomerImage::where('customer_id',Auth::id())->where('type','url')->get();
        return view('frontend.customer.video_links',compact('video_links'));
    }
    public function other_files()
    {
        $other_files = CustomerImage::where('customer_id',Auth::id())->where('type','pdf')->get();
        return view('frontend.customer.other_files',compact('other_files'));
    }
    public function editProfile() {
        return view('frontend.customer.profile_edit');
    }
    public function updateProfile(Request $request) {
//        dd('saf');
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile_number'=> 'required',
        ]);
        $user = User::findOrFail(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        if($request->hasFile('image')){
            $user->image = $request->image->store('uploads/profile');
        }
        $user->update();
        Toastr::success('Profile Updated Successfully');
        return redirect()->back();

    }
    public function editPassword() {
        return view('frontend.customer.password_edit');
    }
    public function updatePassword(Request $request) {
        $this->validate($request, [
            'password' =>  'required|confirmed|min:6',
        ]);

        $user =  User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('Password Updated Successfully','Success');
        Auth::logout();
        return redirect()->route('login');
//        return redirect()->back();
    }
    public function message() {

        return view('frontend.customer.message');
    }
}
