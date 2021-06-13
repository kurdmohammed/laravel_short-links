<?php

use App\Http\Controllers\ShortController;
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

Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';

Route::get('/create',[ShortController::class,'create'])->name('create');
Route::get('/dashboard',[ShortController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::post('/store',[ShortController::class,'store'])->name('store');

Route::get('/{code}',[ShortController::class,'shortlink'])->name('shortlink');

Route::delete('/{id}',[ShortController::class,'destroy'])->name('destroy');

