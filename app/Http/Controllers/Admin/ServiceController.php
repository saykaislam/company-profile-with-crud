<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Service;
use App\ServiceCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        //dd('kvk');
        $services = Service::all();
        return view('backend.admin.services.service.index',compact('services'));
    }

    public function create()
    {
        $servCats = ServiceCategory::all();
//        dd($servCats);
        return view('backend.admin.services.service.create',compact('servCats'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);

        $services = new Service();
        $services->title = $request->title;
        $services->slug = Str::slug($request->title);
        $services->description = $request->description;
        $services->short_description = strip_tags($request->description);
        $services->meta_title = $request->meta_title;
        $services->meta_description = $request->meta_description;
        $services->image_alt = $request->image_alt;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/service/'.$image_name, $proImage);

        }
        else {
            $image_name = "default.png";
        }
        $services->image = $image_name;

        $image = $request->file('pro_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $thambnails_image = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(370, 276)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/service/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = "default.png";
        }
        $services->pro_image = $thambnails_image;

        $services->save();

//        $images = $request->file('gallery_image');
//        if(isset($images)){
//            foreach($images as $image){
//                $currentDate = Carbon::now()->toDateString();
//                $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//                //            resize image for banner and upload
//                $BannerImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
//                Storage::disk('public')->put('uploads/service/gallery/' . $imagename, $BannerImage);
//                $gallery = new Gallery();
//                $gallery->service_id = $services->id;
//                $gallery->image = $imagename;
//                $gallery->save();
//            }
//        }
        Toastr::success('Service Created Successfully', 'Success');
        return redirect()->route('admin.services.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = ServiceCategory::all();
        $service = Service::find($id);
        return view('backend.admin.services.service.edit',compact('service','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description'=> 'required',

        ]);
        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->short_description = strip_tags($request->description);
        $service->meta_title = $request->meta_title;
        $service->meta_description = $request->meta_description;
        $service->image_alt = $request->image_alt;

        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/service/'. $service->image)) {
                Storage::disk('public')->delete('uploads/service/'. $service->image);
            }

//            resize image for project and upload
            $proImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/service/'. $image_name, $proImage);

        }
        else {
            $image_name =$service->image;
        }
        $service->image = $image_name;

        $image = $request->file('pro_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $thambnails_image = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/service/thambnails/'. $service->pro_image)) {
                Storage::disk('public')->delete('uploads/service/thambnails/'. $service->pro_image);
            }
//            resize image for project and upload
            $proImage = Image::make($image)->resize(370, 276)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/service/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = $service->pro_image;
        }
        $service->pro_image = $thambnails_image;
        $service->save();

        Toastr::success('Service Updated Successfully', 'Success');
        return redirect()->route('admin.services.index');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/service/' . $service->image);
        Storage::disk('public')->delete('uploads/service/thambnails/'. $service->pro_image);

        $service->delete();
        Toastr::success('Service Deleted Successfully Done!');
        return redirect()->route('admin.services.index');
    }

    public function slugChange(Request $request)
    {
        $service = Service::find($request->service_id);
        $service->slug = $request->slug;
        $service->save();
        Toastr::success('Slug change Successfully Done!');
        return redirect()->route('admin.services.edit',$request->service_id);
    }
}
