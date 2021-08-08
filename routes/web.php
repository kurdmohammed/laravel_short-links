<?php

use App\Http\Controllers\ShortController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChartController;

use Illuminate\Support\Facades\Route;

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

 /*Route::get('/', function () {
    return view('profile');
}); */

Route::get('/chart',[ChartController::class,'index']);

require __DIR__.'/auth.php';

Route::get('/dashboard',[ShortController::class,'create'])->middleware(['auth'])->name('dashboard');
Route::get('/',[ShortController::class,'index'])->name('index');
Route::post('/store',[ShortController::class,'store'])->name('store');
Route::get('/{code}',[ShortController::class,'shortlink'])->name('shortlink');
Route::delete('/delete/{id}',[ShortController::class,'destroy'])->name('destroy');


Route::get('profile/index',[ProfileController::class,'index'])->name('profile.index');
Route::get('/profile/create',[ProfileController::class,'create'])->middleware(['auth'])->name('profile.create');
Route::post('/profile/store',[ProfileController::class,'store'])->name('profile.store');
Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('/profile/update/{user_id}',[ProfileController::class,'update'])->name('profile.update');



