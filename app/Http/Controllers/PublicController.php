<?php

namespace App\Http\Controllers;

use App\Models\CarLocationRequest;
use App\Models\Costumer;
use App\Models\Vehicule;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function quickBooking(){
        $cars = Vehicule::with("brand")
        ->with("brand")
        ->with("medias")
        ->get();
        return view("web.quick_booking", ["cars"=> $cars]);
    }



    public function makeBookingRequest(Request $request){
        try{
            $data = $request->validate([
                "costumer.nom"=>"required|string",
                "costumer.address"=>"required|string",
                "costumer.phone"=>"required|string",
                "costumer.email"=>"nullable|string",
                "costumer.profession"=>"nullable|string",
                "costumer.latlng"=>"nullable|string",
                "loan.car_id"=> "required|int|exists:vehicules,id",
                "loan.date"=> "required|date",
                "loan.area"=> "nullable|string",
                "loan.recommandation"=> "nullable|string",
            ]);
            $ip = $request->ip();

            $costumer = Costumer::create([
                "fullname"=> $data["costumer"]["nom"],
                "address"=> $data["costumer"]["address"],
                "phone"=> $data["costumer"]["phone"],
                "email"=> $data["costumer"]["email"],
                "profession"=> $data["costumer"]["profession"],
                "ipaddress"=>$ip,    
                "latlng"=>$data["costumer"]["latlng"],    
            ]);

            if($costumer){
                $formData = $data["loan"];
                $code = CarLocationRequest::getUniqueCode();
                $req = CarLocationRequest::create([
                    "costumer_id"=>$costumer->id,
                    "vehicule_id"=> $formData["car_id"],
                    "pick_up_date"=> $formData["date"],
                    "pick_up_area"=> $formData["area"],
                    "recommandation"=>$formData["recommandation"],
                    "code"=>$code,
                ]);
                if($req){
                    $costumer["requests"] = $req;
                }
                return response()->json([
                    "status"=> "success",
                    "costumer"=>$costumer
                ]);
            }
        }
        catch (ValidationException $e) {
            // Gestion des erreurs de validation
            $errors = $e->errors();
            return response()->json(['error' => $errors]);

        } catch (QueryException $e) {
            // Gestion des erreurs liées à la base de données
            return response()->json(['error' => $e->getMessage()]);

        } catch (\Exception $e) {
            // Gestion des exceptions générales
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
