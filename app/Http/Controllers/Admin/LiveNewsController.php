<?php

namespace App\Http\Controllers\Admin;

use App\LiveNews;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LiveNewsController extends Controller
{

    public function index()
    {
        $live_news = LiveNews::all();

        return view('backend.admin.news.live-news',compact('live_news'));
    }


    public function create()
    {
        $live_news=LiveNews::first();
        if (empty($live_news))
        {
            return view('backend.admin.news.create-new',compact('live_news'));
        }
        else
        {
            return view('backend.admin.news.update-news',compact('live_news'));
        }
    }

    public function store(Request $request)
    {
       $this->validate($request,[
          'description'=>'required',

       ]);
        $live_news = new LiveNews();
        $live_news->description = $request->description;
        $live_news->save();
        Toastr::success('Live News Created Successfully', 'Success');
        return redirect()->route('admin.live-news.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $live_news=LiveNews::find($id);
        return view('backend.admin.news.update-news',compact('live_news'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'description'=>'required',

        ]);
        $live_news = LiveNews::find($id);
        $live_news->description = $request->description;
        $live_news->save();
        Toastr::success('live news Created Successfully', 'Success');
        return redirect()->route('admin.live-news.index');
    }


    public function destroy($id)
    {
        $live_news = LiveNews::find($id);
        $live_news->delete();
        Toastr::success('live news Deleted Successfully', 'Success');
        return redirect()->route('admin.live-news.index');
    }
}
