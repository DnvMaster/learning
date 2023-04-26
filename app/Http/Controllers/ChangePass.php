<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function ChangePass()
    {
        return view('admin.body.change_password');
    }
    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'oldpassword'=>'required',
            'password'=>'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Ваш пароль был успешно обновлён.');
        }
        else {
            return redirect()->back()->with('error','Введённый пароль не является верным.');
        }
    }
    public function ProfileUpdate()
    {
        if (Auth::user())
        {
            $user = User::find(Auth::user()->id);
            if ($user)
            {
                return view('admin.body.update_profile',compact('user'));
            }
        }
    }
    public function UpdateUserProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user)
        {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
            return Redirect()->back()->with('success','Профиль пользователя успешно обновлён');
        }
        else
        {
            return redirect()->back();
        }
    }
}
