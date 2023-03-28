<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {
        return view('admin.category.index');
    }

    public function addCategories(Request $request)
    {
        $validateData = $request->validate([
            'category_name'=> 'required|unique:posts|max:255',
        ], ['category_name.required'=>'Пожалуйста, введите название категории!',
            'category_name.max'=>'Допустимое количество символов, должно быть менее 255!',
            ]);
    }
}
