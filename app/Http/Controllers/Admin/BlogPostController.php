<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\BlogPost;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogPostController extends Controller
{

    public function index()
    {
        $posts = BlogPost::latest()->get();
        return view('backend.admin.Blog.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('backend.admin.Blog.post.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);
        $post = new BlogPost();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->blog_category_id = $request->category_id;
        $post->description = $request->description;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage = Image::make($image)->resize(818, 461)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/post/' . $imagename, $proImage);

            //thumbnails
            $proImage = Image::make($image)->resize(330, 350)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/post/thumbnails/' . $imagename, $proImage);
        }else {
            $imagename = "default.png";
        }

        $post->image = $imagename;
        $post->save();
        Toastr::success('Post Created Successfully', 'Success');
        return redirect()->route('admin.blog-post.index');
    }

    /**z
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = BlogPost::find($id);
        return view('backend.admin.Blog.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);
        $categories = BlogCategory::all();
        return view('backend.admin.Blog.post.edit',compact('post','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'category_id'=> 'required',
            'description'=> 'required',
        ]);
        $post =  BlogPost::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->blog_category_id = $request->category_id;
        $post->description = $request->description;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if(Storage::disk('public')->exists('uploads/post/'.$post->image))
            {
                Storage::disk('public')->delete('uploads/post/'.$post->image);
                Storage::disk('public')->delete('uploads/post/thumbnails/'.$post->image);
            }

//            resize image for hospital and upload
            $proImage = Image::make($image)->resize(818, 461)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/post/' . $imagename, $proImage);

            //thumbnails
            $proImage = Image::make($image)->resize(390, 290)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/post/thumbnails/' . $imagename, $proImage);
        }else {
            $imagename = $post->image;
        }

        $post->image = $imagename;
        $post->save();
        Toastr::success('Post Updated Successfully', 'Success');
        return redirect()->route('admin.blog-post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        //delete old image.....
        if(Storage::disk('public')->exists('uploads/post/'.$post->image))
        {
            Storage::disk('public')->delete('uploads/post/'.$post->image);
            Storage::disk('public')->delete('uploads/post/thumbnails/'.$post->image);
        }
        $post->delete();
        Toastr::success('Post Deleted Successfully', 'Success');
        return redirect()->route('admin.blog-post.index');
    }
}
