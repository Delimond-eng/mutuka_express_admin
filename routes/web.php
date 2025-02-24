<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* Route::view("pages.dashboard"); */

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Car manage route view call
Route::get("/cars.management",[AppController::class, 'carsManagementView'])->name('cars.management');

// Route allow to create new car with all config
Route::post("/car.create", [AppController::class, 'createCar'])->name("car.create");
