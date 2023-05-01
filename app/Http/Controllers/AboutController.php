<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use App\Models\Multipic;
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
    public function EditAbout($id)
    {
        $home_about = HomeAbout::find($id);
        return view('admin.home.edit',compact('home_about'));
    }
    public function UpdateAbout(Request $request, $id)
    {
        HomeAbout::find($id)->update([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
        ]);
        return Redirect()->route('home.about')->with('success','Раздел о нас упешно обновлён.');
    }
    public function DeleteAbout($id)
    {
        HomeAbout::find($id)->Delete();
        return Redirect()->back()->with('success','Раздел о нас упешно удалён.');
    }
    public function Portfolio()
    {
        $images = Multipic::all();
        return view('pages.portfolio',compact('images'));
    }
}
