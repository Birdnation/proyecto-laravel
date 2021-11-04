<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword (Request $request){
        $findUser = User::where('id', $request->id)->first();

        $request->validate([
            'password' => ['confirmed', 'min:6',' max:6', 'required'],
        ]);


        $findUser->update(['password' => Hash::make($request->password)]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('password', 'updated');


        /* return redirect(route('home'))->with('password', 'updated'); */
    }
}
