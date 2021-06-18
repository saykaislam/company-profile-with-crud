<?php

namespace App\Http\Controllers\Admin;

use App\CustomerImage;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = User::where('role_id',2)->get();
        return view('backend.admin.customer.index',compact('customers'));
    }

    public function create()
    {
        return view('backend.admin.customer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile_number' => 'required|min:8|numeric',
            'password' => 'required|min:6',
        ]);
        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile_number = $request->mobile_number;
        $customer->password = Hash::make($request->password);
        $customer->role_id = 2;
        if($request->hasFile('image')){
            $customer->image = $request->image->store('uploads/profile');
        }

        $customer->save();
        Toastr::success('Customer Added successfully done!');
        return redirect()->route('admin.customer.index');

    }

    public function show($id)
    {
        $customer = User::find($id);
        $customer_images = CustomerImage::where('customer_id',$customer->id)->get();
        return view('backend.admin.customer.customer_show',compact('customer','customer_images'));
    }

    public function edit($id)
    {
        $customer = User::find($id);
        return view('backend.admin.customer.edit',compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile_number'=> 'required',
        ]);
        $customer = User::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile_number = $request->mobile_number;
        $customer->password = Hash::make($request->password);
        if($request->hasFile('image')){
            $customer->image = $request->image->store('uploads/profile');
        }
        $customer->update();
        Toastr::success('Customer Updated Successfully');
        return redirect()->route('admin.customer.index');
    }

    public function destroy($id)
    {
        $customer = User::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/profile/' . $customer->image);
        $customer->delete();
        Toastr::success('Customer Deleted Successfully', 'Success');
        return redirect()->route('admin.customer.index');
    }
    public function imageCreate($id)
    {
        $customer = User::find($id);
        return view('backend.admin.customer.image_create',compact('customer'));
    }
    public function imageStore(Request $request,$id)
    {
       if ($request->image){
           $customer = User::find($id);
           $customer_image = new CustomerImage();
           $customer_image->customer_id = $customer->id;
           $customer_image->title = $request->title;
           $customer_image->message = $request->message;
           $customer_image->type = 'image';
           if($request->hasFile('image')){
               $customer_image->image = $request->image->store('uploads/customer_image');
           }
           $customer_image->save();
           Toastr::success('Image Added successfully done!');
           return redirect()->route('admin.customer.show',compact('customer'));
       }elseif ($request->title && $request->url){
           $customer = User::find($id);
           $customer_video_link = new CustomerImage();
           $customer_video_link->customer_id = $customer->id;
           $customer_video_link->title = $request->title;
           $customer_video_link->url = $request->url;
           $customer_video_link->message = $request->message;
           $customer_video_link->type = 'url';
           $customer_video_link->save();
           Toastr::success('Video Link Added successfully done!');
           return redirect()->route('admin.customer.show',compact('customer'));
       }else{
           $customer = User::find($id);
           $customer_other_file = new CustomerImage();
           $customer_other_file->title = $request->title;
           $customer_other_file->customer_id = $customer->id;
           $customer_other_file->message = $request->message;
           $customer_other_file->type = 'pdf';
           if($request->hasFile('other_files')){
               $customer_other_file->other_files = $request->other_files->store('uploads/customer_image');
           }
           $customer_other_file->save();
           Toastr::success('Other Files Added successfully done!');
           return redirect()->route('admin.customer.show',compact('customer'));
       }


    }
    public function imageEdit($id)
    {
        $customer_image = CustomerImage::find($id);
        $customer = User::where('id',$customer_image->customer_id);
        return view('backend.admin.customer.image_edit',compact('customer_image','customer'));
    }
    public function imageUpdate(Request $request,$id)
    {
        $customer_image = CustomerImage::find($id);
        $customer = User::where('id',$customer_image->customer_id)->first();
        if ($customer_image->type == 'image'){
            $customer_image->title = $request->title;
            $customer_image->message = $request->message;
            if($request->hasFile('image')){
                $customer_image->image = $request->image->store('uploads/customer_image');
            }
            $customer_image->save();
            Toastr::success('Image Updated successfully done!');
            return redirect()->route('admin.customer.show',compact('customer'));
        }elseif ($customer_image->type == 'url'){
            $customer_image->title = $request->title;
            $customer_image->url = $request->url;
            $customer_image->message = $request->message;
            $customer_image->save();
            Toastr::success('Video Link Updated successfully done!');
            return redirect()->route('admin.customer.show',compact('customer'));
        }else {
            $customer_image->title = $request->title;
            $customer_image->message = $request->message;
            if($request->hasFile('other_files')){
                $customer_image->other_files = $request->other_files->store('uploads/customer_image');
            }
            $customer_image->save();
            Toastr::success('Other Files Updated successfully done!');
            return redirect()->route('admin.customer.show',compact('customer'));
        }


    }
    public function imageDestroy($id)
    {
        $customer_image = CustomerImage::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/customer_image/' . $customer_image->image);
        $customer_image->delete();
        Toastr::success('Image Deleted Successfully', 'Success');
        return redirect()->back();
    }
}
