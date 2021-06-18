<?php

namespace App\Http\Controllers\Admin;

use App\Equipment;
use App\Project;
use App\Service;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $project=Project::all()->count();
        $service = Service::all()->count();
        $equipment = Equipment::all()->count();
        return view('backend.admin.profile.index',compact('project','equipment','service'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' =>  'required',
            'email' =>  'required|email|unique:users,email,'.$id,
        ]);

        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        Toastr::success('Admin Profile Updated Successfully','Success');
        return redirect()->back();
    }
    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' =>  'required|confirmed|min:6',
        ]);
        $user =  User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('Admin Password Updated Successfully','Success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
