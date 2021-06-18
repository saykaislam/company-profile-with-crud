<?php

namespace App\Http\Controllers\Frontend;

use App\BlogCategory;
use App\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function Posts()
    {
        $posts = BlogPost::latest()->paginate(6);
        $categories = BlogCategory::all();
        $recentPosts = BlogPost::latest()->take(4)->get();
        return view('frontend.Pages.post_list', compact('posts', 'categories','recentPosts'));
    }
    public function postByCategory($slug)
    {
        $category = BlogCategory::where('slug',$slug)->first();
        $posts = $category->posts()->paginate(8);
        $categories = BlogCategory::all();
        $recentPosts = BlogPost::latest()->take(4)->get();
        return view('frontend.Pages.category_post_list',compact('posts','categories','recentPosts'));

    }
    public function postDetails($slug)
    {
        $post = BlogPost::where('slug',$slug)->first();
        $categories = BlogCategory::all();
        $recentPosts = BlogPost::latest()->take(4)->get();
        return view('frontend.Pages.post_details',compact('post','categories','recentPosts'));

    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $posts = BlogPost::where('title','LIKE',"%$query%")->get();
        $categories = BlogCategory::all();
        $recentPosts = BlogPost::latest()->take(4)->get();
        return view('frontend.Pages.post_search',compact('posts','query','categories','recentPosts'));
    }


}
