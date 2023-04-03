<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo " This is home page ";
});

Route::get('/about', [AboutController::class, 'index'])->name('about')->middleware('check');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');
