<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
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

Route::get('/about', [AboutController::class, 'index'])->middleware('check');

Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts');

Route::get('/category/all',[CategoryController::class, 'categories'])->name('all.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');
