<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('backend.admin.setting.index',compact('settings'));
    }

    public function create()
    {
        $settings = Setting::first();
        if (empty($settings))
        {
            return view('backend.admin.setting.create',compact('settings'));
        }
        else
        {
            return view('backend.admin.setting.update',compact('settings'));
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'meta_title'=>'required',

        ]);
        $settings = new Setting();
        $settings->meta_title = $request->meta_title;
        $settings->meta_description = $request->meta_description;
        $settings->save();
        Toastr::success('Settings Created Successfully', 'Success');
        return redirect()->route('admin.settings.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $settings =  Setting::find($id);
        return view('backend.admin.setting.update',compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'meta_title'=>'required',

        ]);
        $settings =  Setting::find($id);
        $settings->meta_title = $request->meta_title;
        $settings->meta_description = $request->meta_description;
        $settings->save();
        Toastr::success('Settings Updated Successfully', 'Success');
        return redirect()->route('admin.settings.index');
    }

    public function destroy($id)
    {
        $settings = Setting::find($id);
        $settings->delete();
        Toastr::success('Settings Deleted Successfully', 'Success');
        return redirect()->route('admin.settings.index');
    }
}
