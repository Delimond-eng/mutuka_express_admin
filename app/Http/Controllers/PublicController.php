<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        $sellCars = Vehicule::with("brand")
        ->get();
        return view("web.home",["cars"=> $sellCars]);
    }


    public function getSingleCar(Request $request){
        $carId = $request->query("car_id");
        $car = Vehicule::with("brand")
            ->with("brand")
            ->with("medias")
            ->with("specifications.specification")
            ->with("features.feature")
            ->where("id",$carId)
            ->first();
            if($car){
                $car = Vehicule::with("brand")
                ->with("brand")
                ->with("medias")
                ->with("specifications.specification")
                ->with("features.feature")
                ->where("id",$carId)
                ->first();
                return view("web.car_details",["car"=> $car]);
            }else{
                return response()->view('errors.404', [], 404);
             }
            
    }

    public function getMoreCars(Request $request){
        $cars = Vehicule::with("brand")
        ->with("brand")
        ->with("medias")
        ->get();
        return view('web.more_cars', ['cars'=> $cars]);
    }

    public function viewCarDetails(){
        return view("web.car_details");
    }
}
