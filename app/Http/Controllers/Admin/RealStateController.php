<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\RealState;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RealStateController extends Controller
{

    public function index()
    {
        $projects = RealState::latest()->get();
        return view('backend.admin.real_state.index',compact('projects'));
    }

    public function create()
    {
        return view('backend.admin.real_state.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'status'=> 'required',
            'description'=> 'required',
            'image'=> 'required',

        ]);
        $projects = new RealState();
        $projects->title = $request->title;
        $projects->slug = Str::slug($request->title);
        $projects->status = $request->status;
        $projects->description = $request->description;
        $projects->map = $request->map;

        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//          resize image for project and upload
            $proImage = Image::make($image)->resize(210, 350)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/real_state/'.$image_name, $proImage);
        }
        else {
            $image_name = "default.png";
        }
        $projects->image = $image_name;

        $image = $request->file('pro_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $thambnails_image = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/real_state/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = "default.png";
        }
        $projects->pro_image = $thambnails_image;
        $projects->save();


        $images = $request->file('gallery_image');
        if(isset($images)){
            foreach ($images as $image){
                $currentDate = Carbon::now()->toDateString();
                $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                //            resize image for banner and upload
                $BannerImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
                Storage::disk('public')->put('uploads/real_state/gallery/' . $imagename, $BannerImage);
                $gallery = new Gallery();
                $gallery->real_states_id = $projects->id;
                $gallery->image = $imagename;
                $gallery->save();
            }
        }
        Toastr::success('Real State Project Created Successfully', 'Success');
        return redirect()->route('admin.real-estate-project.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $projects = RealState::find($id);
        return view('backend.admin.real_state.edit', compact('projects'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description'=> 'required',
        ]);

        $projects =  RealState::find($id);
        $projects->title = $request->title;
        //$projects->slug = Str::slug($request->title);
        $projects->map = $request->map;
        $projects->status = $request->status;
        $projects->description = $request->description;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (Storage::disk('public')->exists('uploads/real_state/'. $projects->image)) {
                Storage::disk('public')->delete('uploads/real_state/'. $projects->image);
            }
            //resize image for project and upload
            $proImage = Image::make($image)->resize(210, 350)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/real_state/'.$image_name, $proImage);
        }
        else {
            $image_name =$projects->image;
        }
        $projects->image = $image_name;

        $image = $request->file('pro_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/real_state/thambnails/'. $projects->pro_image)) {
                Storage::disk('public')->delete('uploads/real_state/thambnails/'. $projects->pro_image);
            }
            $thambnails_image = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/real_state/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = $projects->pro_image;
        }
        $projects->pro_image = $thambnails_image;

        $projects->save();

        Toastr::success('Project Updated Successfully', 'Success');
        return redirect()->route('admin.real-estate-project.index');
    }

    public function destroy($id)
    {
        $projects = RealState::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/real_state/' . $projects->image);
        Storage::disk('public')->delete('uploads/real_state/'.$projects->pro_image);
        $projects->delete();
        Toastr::success('Project Deleted Successfully Done!');
        return redirect()->route('admin.real-estate-project.index');
    }


    public function imageShow($id)
    {

        $projects = RealState::find($id);
        $galleries = Gallery::where('real_states_id',$projects->id)->get();
        return view('backend.admin.real_state.all_img_show', compact('projects','galleries'));
    }
    public function imageStore( Request $request)
    {
        $images = $request->file('gallery_image');
        if(isset($images)){
            foreach ($images as $image){
                $currentDate = Carbon::now()->toDateString();
                $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                //            resize image for banner and upload
                $BannerImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
                Storage::disk('public')->put('uploads/real_state/gallery/'. $imagename, $BannerImage);
                $gallery = new Gallery();
                $gallery->real_states_id = $request->project_id;
                $gallery->image = $imagename;
                $gallery->save();
            }
        }
        Toastr::success('Image Added Successfully', 'Success');
        return back();
    }

    public function imageEdit( Request $request, $id)
    {

        $gallery = Gallery::find($id);

        $image = $request->file('gallery_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (Storage::disk('public')->exists('uploads/real_state/gallery/'. $gallery->image)) {
                Storage::disk('public')->delete('uploads/real_state/gallery/'. $gallery->image);
            }
            //resize image for project and upload
            $proImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/real_state/gallery/'.$image_name, $proImage);
        }
        else {
            $image_name =$gallery->image;
        }
        $gallery->image = $image_name;
        $gallery->save();
        Toastr::success('Image change Successfully', 'Success');
        return back();

    }
    public function imageDelete($id)
    {
        $gl = Gallery::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/real_state/gallery/' . $gl->image);
        $gl->delete();
        Toastr::success('Image Deleted Successfully Done!');
        return redirect()->back();
    }
}















