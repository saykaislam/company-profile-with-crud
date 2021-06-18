<?php

namespace App\Http\Controllers\Admin;


use Brian2694\Toastr\Facades\Toastr;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('backend.admin.clients.index',compact('clients'));
    }
    public function create()
    {
        return view('backend.admin.clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=> 'required',
        ]);
        $clients = new Client();
        $clients->url = $request->url;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(105, 76)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/client/'.$image_name, $proImage);

        }
        else {
            $image_name = "default.png";
        }
        $clients->image = $image_name;


        $clients->save();
        Toastr::success('Client Created Successfully', 'Success');
        return redirect()->route('admin.client.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $clients = Client::find($id);
        return view('backend.admin.clients.edit',compact('clients'));
    }

    public function update(Request $request, $id)
    {

        $clients = Client::find($id);

        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(105, 76)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/client/'.$image_name, $proImage);

        }
        else {
            $image_name = $clients->image;
        }
        $clients->image = $image_name;


        $clients->save();
        Toastr::success('Client Updated Successfully', 'Success');
        return redirect()->route('admin.client.index');
    }

    public function destroy($id)
    {
        $clients = Client::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/client/' . $clients->image);
        $clients->delete();
        Toastr::success('Client Deleted Successfully', 'Success');
        return redirect()->route('admin.client.index');
    }
}
