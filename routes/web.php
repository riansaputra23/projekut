<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\regiscontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', [GajiController::class, 'index']);
Route::resource('/dashboard/gaji', GajiController::class);

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/profile', [ContactController::class, 'index']);

Route::get('/login', [logincontroller::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [logincontroller::class,'authenticate']);
Route::post('/logout', [logincontroller::class,'logout']);

Route::get('/register', [regiscontroller::class,'index'])->middleware('guest');
Route::post('/register', [regiscontroller::class,'store']);