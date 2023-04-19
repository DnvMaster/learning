<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $home_about = HomeAbout::latest()->get();
        return view('admin.home.index',compact('home_about'));
    }
    public function AddAbout()
    {
        return view('admin.home.create');
    }
    public function StoreAbout(Request $request)
    {
        HomeAbout::insert([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('home.about')->with('success','Раздел о нас упешно добавлен.');
    }
}
