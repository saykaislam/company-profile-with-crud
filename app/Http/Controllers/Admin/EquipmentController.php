<?php

namespace App\Http\Controllers\Admin;

use App\Equipment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all();
        //dd($equipments);
        return view('backend.admin.equipment.index',compact('equipments'));
//        return view('backend.admin.equipment.index');
    }

    public function create()
    {
        return view('backend.admin.equipment.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
//            'category_id'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);

        $equipments = new Equipment();
        $equipments->title = $request->title;
        $equipments->slug = Str::slug($request->title);
        $equipments->image_alt = $request->image_alt;
        $equipments->description = $request->description;
        $equipments->short_description = strip_tags($request->description);
        $equipments->meta_title = $request->meta_title;
        $equipments->meta_description = $request->meta_description;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(870, 576)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/equipment/'.$image_name, $proImage);

        }
        else {
            $image_name = "default.png";
        }
        $equipments->image = $image_name;

        $image = $request->file('pro_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $thambnails_image = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for project and upload
            $proImage = Image::make($image)->resize(370, 276)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/equipment/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = "default.png";
        }
        $equipments->pro_image = $thambnails_image;

        $equipments->save();

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
        Toastr::success('Equipment Created Successfully', 'Success');
        return redirect()->route('admin.equipments.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $equipment = Equipment::find($id);
        return view('backend.admin.equipment.edit',compact('equipment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
//            'category_id'=> 'required',
            'description'=> 'required',

        ]);
        $equipment = Equipment::find($id);
        $equipment->title = $request->title;
        $equipment->image_alt = $request->image_alt;
        $equipment->description = $request->description;
        $equipment->short_description = strip_tags($request->description);
        $equipment->meta_title = $request->meta_title;
        $equipment->meta_description = $request->meta_description;

        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/equipment/'. $equipment->image)) {
                Storage::disk('public')->delete('uploads/equipment/'. $equipment->image);
            }

//            resize image for project and upload
            $proImage = Image::make($image)->resize(870, 576)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/equipment/'. $image_name, $proImage);

        }
        else {
            $image_name =$equipment->image;
        }
        $equipment->image = $image_name;

        $image = $request->file('pro_image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $thambnails_image = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/equipment/thambnails/'. $equipment->pro_image)) {
                Storage::disk('public')->delete('uploads/equipment/thambnails/'. $equipment->pro_image);
            }
//            resize image for project and upload
            $proImage = Image::make($image)->resize(370, 276)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/equipment/thambnails/'.$thambnails_image, $proImage);

        }
        else {
            $thambnails_image = $equipment->pro_image;
        }
        $equipment->pro_image = $thambnails_image;
        $equipment->save();

        Toastr::success('Equipment Updated Successfully', 'Success');
        return redirect()->route('admin.equipments.index');
    }

    public function destroy($id)
    {
        $equipment = Equipment::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/equipment/' . $equipment->image);
        Storage::disk('public')->delete('uploads/equipment/thambnails/'. $equipment->pro_image);

        $equipment->delete();
        Toastr::success('Equipment Deleted Successfully Done!');
        return redirect()->route('admin.equipments.index');
    }
    public function slugChange(Request $request)
    {
        $equipment = Equipment::find($request->equipment_id);
        $equipment->slug = $request->slug;
        $equipment->save();
        Toastr::success('Slug change Successfully Done!');
        return redirect()->route('admin.equipments.edit',$request->equipment_id);
    }
}
