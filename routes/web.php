<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

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

Route::get('createpage',[GuestController::class,'create'])->name('create');
Route::post('createpage/store',[GuestController::class,'store'])->name('createpage.store');
Route::get('createfilter_image',[GuestController::class,'image_filter']);