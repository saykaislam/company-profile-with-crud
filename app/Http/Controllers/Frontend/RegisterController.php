<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, [
            'name' =>  'required',
            'email' =>  'required',
            'mobile_number' => 'required|min:8|numeric',
            'password' => 'required|min:6',
        ]);
        $userReg = new User();
        $userReg->name = $request->name;
        $userReg->email = $request->email;
        $userReg->mobile_number = $request->mobile_number;
        $userReg->password = Hash::make($request->password);
        $userReg->role_id= 2;
        $userReg->save();
        Toastr::success('Your registration successfully done!');
        return redirect()->route('customer.dashboard');
//        return redirect()->route('get-verification-code',$userReg->id);
//        $credential = [
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => $request->password,
//        ];
//        if (Auth::attempt($credential)) {
//            return redirect()->route('user.dashboard');
//        }
//
    }
}
