<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\siginController;
use App\Http\Controllers\profileController;

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




Route::get('login', [loginController::class,'index'])->middleware('guest')->name('login');
Route::post('login',[loginController::class,'login'])->middleware('guest');
Route::post('/logout',[loginController::class,'logout']);

Route::get('/sigin',[siginController::class,'index'])->middleware('guest');
Route::post('/sigin',[siginController::class,'store']);




Route::resource('home', homeController::class)->middleware(['auth','verified']);


Route::resource('profile', profileController::class)->middleware(['auth','verified']);


Route::resource('home/{id}/comment',commentController::class)->middleware(['auth','verified']);


