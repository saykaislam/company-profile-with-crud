<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Gallery;
use App\Project;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::latest()->get();
        return view('backend.admin.projects.project.index',compact('projects'));
    }

    public function create()
    {
        $categories =Category::all();
        return view('backend.admin.projects.project.create',compact('categories'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
//            'gallery_image'=> 'required',


        ]);

        $projects = new Project();
        $projects->title = $request->title;
        $projects->slug = Str::slug($request->title);
        $projects->category_id = $request->category_id;
        $projects->description = $request->description;
        $projects->meta_title = $request->meta_title;
        $projects->meta_description = $request->meta_description;
        $projects->image_alt = $request->image_alt;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(870, 555)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/project/'.$image_name, $proImage);

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
            $proImage = Image::make($image)->resize(370, 370)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/project/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = "default.png";
        }
        $projects->pro_image = $thambnails_image;

        $projects->save();

        $images = $request->file('gallery_image');
        if(isset($images)){
           foreach($images as $image){
                   $currentDate = Carbon::now()->toDateString();
                   $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
    //            resize image for banner and upload
                   $BannerImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
                   Storage::disk('public')->put('uploads/project/gallery/' . $imagename, $BannerImage);
                   $gallery = new Gallery();
                   $gallery->project_id = $projects->id;
                   $gallery->image = $imagename;
                   $gallery->save();
            }
        }



        Toastr::success('Project Created Successfully', 'Success');
        return redirect()->route('admin.project.index');
    }


    public function show($id)
    {
        $projects = Project::find($id);
        $galleries = Gallery::where('project_id',$projects->id)->get();
        return view('backend.admin.projects.project.all_img_show', compact('projects','galleries'));
    }


    public function edit($id)
    {
        $categories = Category::all();
        $projects = Project::find($id);
        return view('backend.admin.projects.project.edit',compact('projects','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',

        ]);
        $projects = Project::find($id);
        $projects->title = $request->title;
        $projects->category_id = $request->category_id;
        $projects->description = $request->description;
        $projects->meta_title = $request->meta_title;
        $projects->meta_description = $request->meta_description;
        $projects->image_alt = $request->image_alt;

        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/project/'. $projects->image)) {
                Storage::disk('public')->delete('uploads/project/'. $projects->image);
            }

//            resize image for project and upload
            $proImage = Image::make($image)->resize(870, 555)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/project/'. $image_name, $proImage);

        }
        else {
            $image_name =$projects->image;
        }
        $projects->image = $image_name;

        $image = $request->file('pro_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $thambnails_image = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/project/thambnails/'. $projects->pro_image)) {
                Storage::disk('public')->delete('uploads/project/thambnails/'. $projects->pro_image);
            }
//            resize image for project and upload
            $proImage = Image::make($image)->resize(370, 370)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/project/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = $projects->pro_image;
        }
        $projects->pro_image = $thambnails_image;
        $projects->save();

        Toastr::success('Project Updated Successfully', 'Success');
        return redirect()->route('admin.project.index');
    }


    public function destroy($id)
    {
        $projects = Project::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/project/' . $projects->image);
        Storage::disk('public')->delete('uploads/project/thambnails/'. $projects->pro_image);

        $projects->delete();
        Toastr::success('Project Deleted Successfully Done!');
        return redirect()->route('admin.project.index');
    }

    public function imageEdit( Request $request, $id)
    {

        $gallery = Gallery::find($id);

        $image = $request->file('gallery_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (Storage::disk('public')->exists('uploads/project/gallery/' . $gallery->image)) {
                Storage::disk('public')->delete('uploads/project/gallery/' . $gallery->image);
            }
            //resize image for project and upload
            $proImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/project/gallery/' . $image_name, $proImage);
        } else {
            $image_name = $gallery->image;
        }
        $gallery->image = $image_name;
        $gallery->save();
        Toastr::success('Image change Successfully', 'Success');
        return back();
    }

    public function imageStore(Request $request)
    {
        $images = $request->file('gallery_image');
        if(isset($images)){
            foreach ($images as $image){
                $currentDate = Carbon::now()->toDateString();
                $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
                //            resize image for banner and upload
                $BannerImage = Image::make($image)->resize(1920, 1080)->save($image->getClientOriginalExtension());
                Storage::disk('public')->put('uploads/project/gallery/' . $imagename, $BannerImage);
                $gallery = new Gallery();
                $gallery->project_id = $request->project_id;
                $gallery->image = $imagename;
                $gallery->save();
            }
        }
        Toastr::success('Image Added Successfully', 'Success');
        return back();
    }
    public function imageDelete($id)
    {
        $gl = Gallery::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/project/gallery/' . $gl->image);
        $gl->delete();
        Toastr::success('Image Deleted Successfully Done!');
        return redirect()->back();
    }

    public function slugChange(Request $request)
    {
        $project = Project::find($request->project_id);
        $project->slug = $request->slug;
        $project->save();
        Toastr::success('Slug change Successfully Done!');
        return redirect()->route('admin.project.edit',$request->project_id);
    }
}
