<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrands()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function Brands(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',

        ], [
            'brand_name.required' => 'Пожалуйста, введите название брэнда!',
            'brand_image.min' => 'Имя файла изображения, должно быть, не больше 4 символов!',
        ]);
        $brand_image =  $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(70,40)->save('image/brand/'.$name_gen);
        $last_img = 'image/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image'=> $last_img,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->back()->with('success','Брэнд успешно добавлен');
    }

    public function Edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand_name'=>'required|min:4'
        ],[
            'brand_name.required' => 'Пожалуйста, введите название брэнда!',
            'brand_image.min' => 'Имя файла изображения, должно быть, не больше 4 символов!',
        ]);

        $old_image = $request->old_image;
        $brand_image =  $request->file('brand_image');

        if ($brand_image)
        {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image'=> $last_img,
                'created_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Брэнд успешно обновлён');
        }
        else
        {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success','Брэнд успешно обновлён');
        }

    }

    public function Delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();
        return Redirect()->back()->with('success','Данный брэнд успешно удалён.');
    }
    # This is for Multi image all method
    public function Multipic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index',compact('images'));
    }

    public function StoreImg(Request $request)
    {
        $image = $request->file('image');
        foreach ($image as $multi_img)
        {
            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300,300)->save('image/multi/'.$name_gen);
            $last_img = 'image/multi/'.$name_gen;

            Multipic::insert([
                'image'=>$last_img,
                'created_at'=>Carbon::now(),
            ]);
        }
        return Redirect()->back()->with('success','Все изображения были успешно добавлены.');
    }

    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success','Выход пользователя совершён.');
    }
}
