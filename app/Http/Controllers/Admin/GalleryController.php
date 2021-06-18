<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('backend.admin.gallery.index',compact('galleries'));
    }

    public function create()
    {
        return view('backend.admin.gallery.create');
    }

    public function store(Request $request)
    {
        $gallery_image = new Gallery();
        $gallery_image->title = $request->title;
        $gallery_image->url = $request->url;
        if($request->hasFile('image')){
            $gallery_image->image = $request->image->store('uploads/gallery');
        }

        $gallery_image->save();
        Toastr::success('Image Added successfully done!');
        return redirect()->route('admin.gallery.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('backend.admin.gallery.edit',compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->title = $request->title;
        $gallery->url = $request->url;
        if($request->hasFile('image')){
            $gallery->image = $request->image->store('uploads/gallery');
        }
        $gallery->save();
        Toastr::success('Image Updated successfully done!');
        return redirect()->route('admin.gallery.index');
    }

    public function destroy($id)
    {
        $gallery_image = Gallery::find($id);
        //delete old image.....
        Storage::disk('public')->delete('uploads/gallery/' . $gallery_image->image);
        $gallery_image->delete();
        Toastr::success('Image Deleted Successfully', 'Success');
        return redirect()->back();
    }
}
