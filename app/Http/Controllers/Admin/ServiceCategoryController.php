<?php

namespace App\Http\Controllers\Admin;

use App\ServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::all();
        return view('backend.admin.services.category.index',compact('serviceCategories'));
    }

    public function create()
    {
        return view('backend.admin.services.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $cat = new ServiceCategory();
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->save();
        \Brian2694\Toastr\Facades\Toastr::success('Service Category Created Successfully', 'Success');
        return redirect()->route('admin.service-categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $servCat = ServiceCategory::find($id);
        return view('backend.admin.services.category.edit',compact('servCat'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $cat =  ServiceCategory::find($id);
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->save();
        \Brian2694\Toastr\Facades\Toastr::success('Service Category Updated Successfully', 'Success');
        return redirect()->route('admin.service-categories.index');
    }

    public function destroy($id)
    {
        ServiceCategory::destroy($id);
        \Brian2694\Toastr\Facades\Toastr::success('Service Category Deleted Successfully', 'Success');
        return redirect()->route('admin.service-categories.index');
    }
}
