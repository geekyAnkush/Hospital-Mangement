<?php

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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);

Route::get('/home',[\App\Http\Controllers\HomeController::class,'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/add_doctor_view',[\App\Http\Controllers\AdminController::class,'addview']);
Route::post('/upload_doctor',[\App\Http\Controllers\AdminController::class,'upload']);
Route::post('/appointment',[\App\Http\Controllers\HomeController::class,'appoint']);
Route::get('/myappointment',[\App\Http\Controllers\HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[\App\Http\Controllers\HomeController::class,'cancel_appoint']);
Route::get('/showappointment',[\App\Http\Controllers\AdminController::class,'showappointment']);
Route::get('/showDoctors',[\App\Http\Controllers\AdminController::class,'showDoctors']);
Route::get('/approved/{id}',[\App\Http\Controllers\AdminController::class,'approved']);
Route::get('/cancelled/{id}',[\App\Http\Controllers\AdminController::class,'cancelled']);
Route::get('/deldoc/{id}',[\App\Http\Controllers\AdminController::class,'deldoc']);
Route::get('/updoc/{id}',[\App\Http\Controllers\AdminController::class,'updoc']);
Route::post('/editdoc/{id}',[\App\Http\Controllers\AdminController::class,'editdoc']);

