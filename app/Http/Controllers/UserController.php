<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\User;
use Hash;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:director|manager|employee');
    }

    public function dashboard()
    {
        return view('user/dashboard');
    }

    public function changePassword(){
        return view('user.changePassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password'      => ['required', new MatchOldPassword],
            'password'          => ['required'],
            'confirm_password'  => ['same:password']
        ]);

        User::findOrFail(auth()->user()->id)->update(['password' => Hash::make($request->password)]);

        Session::flash('success', 'Password changed successfully!');
        return redirect()->back();

    }
}
