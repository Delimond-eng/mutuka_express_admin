<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PublicController;
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

/**
 * PUBLIC ROUTE
*/
Route::get("/", [PublicController::class,"index"])->name("home");
Route::get("/car_details", [PublicController::class,"getSingleCar"])->name("home");
Route::get("/quick_booking", [PublicController::class,"quickBooking"]);
Route::get("/more_cars", [PublicController::class,"getMoreCars"]);
Route::post("/booking_request", [PublicController::class, "makeBookingRequest"]);


/* ADMIN ROUTE */

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
//Car manage route view call
Route::get("/cars.management",[AppController::class, 'carsManagementView'])->name('cars.management');
// Route allow to create new car with all config
Route::post("/car.create", [AppController::class, 'createCar'])->name("car.create");

Route::get("/config.specifications", [AppController::class,"viewAllSpecifications"])->name("config.specifications");

Route::post("/config.specifications", [AppController::class,"createSpecification"]);

Route::get("/config.features", [AppController::class,"viewAllFeatures"])->name("config.specifications");

Route::post("/config.feature", [AppController::class,"createFeature"]);

Route::get("/config.brands", [AppController::class,"viewAllBrands"])->name("config.specifications");

Route::post("/config.brand", [AppController::class,"createBrand"]);

Route::get("/config.delete", [AppController::class,"deleteDynamically"]);

Route::get("/loans", [    AppController::class,"viewLoans"]);

Route::get("/buy.requests", [    AppController::class,"viewSellRequest"]);
