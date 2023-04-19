<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function HomeAbout()
    {
        $home_about = HomeAbout::latest()->get();
        return view('admin.home.index',compact('home_about'));
    }
}
