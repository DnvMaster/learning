<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home', compact('brands'));
});

Route::get('/home', function () {
    echo " This is home page ";
});

Route::get('/about', [AboutController::class, 'index'])->name('about')->middleware('check');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'Edit']);
Route::post('/category/update/{id}',[CategoryController::class,'Update']);
Route::get('softdelete/category/{id}',[CategoryController::class,'SoftDelete']);
Route::get('category/restore/{id}',[CategoryController::class,'Restore']);
Route::get('category/delete/{id}',[CategoryController::class,'Delete']);

Route::get('/brand/all',[BrandController::class,'AllBrands'])->name('all.brands');
Route::post('/brand/add/',[BrandController::class,'Brands'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('/brand/update/{id}',[BrandController::class,'Update']);
Route::get('/brand/delete/{id}',[BrandController::class,'Delete']);

Route::get('/multi/image',[BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/multi/add',[BrandController::class, 'StoreImg'])->name('store.image');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');

Route::get('/home/about',[AboutController::class,'HomeAbout'])->name('home.about');
