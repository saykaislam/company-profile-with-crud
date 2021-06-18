<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories =Category::latest()->get();
        return  view('backend.admin.projects.category.index',compact('categories'));
    }

    public function create()
    {
        return view('backend.admin.projects.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $cat = new Category();
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->meta_title = $request->meta_title;
        $cat->meta_description = $request->meta_description;
        $cat->save();
        \Brian2694\Toastr\Facades\Toastr::success('Project Category Created Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('backend.admin.projects.category.edit',compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $cat =  Category::find($id);
        $cat->name = $request->name;
        $cat->slug = Str::slug($request->name);
        $cat->meta_title = $request->meta_title;
        $cat->meta_description = $request->meta_description;
        $cat->save();
        \Brian2694\Toastr\Facades\Toastr::success('Project Category Updated Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        \Brian2694\Toastr\Facades\Toastr::success('Project Category Deleted Successfully', 'Success');
        return redirect()->route('admin.category.index');
    }
    public function slugChange(Request $request)
    {
        $cat = Category::find($request->category_id);
        $cat->slug = $request->slug;
        $cat->save();
        Toastr::success('Slug change Successfully Done!');
        return redirect()->route('admin.category.edit',$request->category_id);
    }
}
