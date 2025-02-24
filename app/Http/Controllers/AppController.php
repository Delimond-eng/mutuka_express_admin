<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use App\Models\Feature;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Traits\ValidationAndExceptionHandler;
use App\Models\Vehicule;
use App\Models\VehiculeFeature;
use App\Models\VehiculeSpecification;
use App\Models\VehiculeLocationPrice;
use App\Models\VehiculeMedia;
use App\Models\VehiculeSellPrice;

class AppController extends Controller
{

    use ValidationAndExceptionHandler;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function carsManagementView(){
        $brands = CarBrand::orderBy('libelle', 'ASC')->get();
        $specifications = Specification::orderBy('libelle', 'ASC')->get();
        $features = Feature::orderBy('libelle', 'ASC')->get();
        $allCars = Vehicule::with("medias")
        ->with("brand")
        ->with("features.feature")
        ->with("specifications.specification")
        ->with("location")
        ->with("vente")->orderBy("id", "DESC")->get();
        return view("pages.carsManagement", [
            "vehicules"=>$allCars,
            "brands"=> $brands,
            "specifications"=> $specifications,
            "features"=> $features,
        ]);
    }

    public function createCar(Request $request)
    {
    $rules = [
        'vehicule.libelle' => 'required|string',
        'vehicule.description' => 'required|string',
        'vehicule.brand_id' => 'required|int|exists:car_brands,id',
        'sell_price.amount' => 'nullable|string',
        'sell_price.currencie' => 'nullable|string',
        'location_price.amount' => 'nullable|string',
        'location_price.currencie' => 'nullable|string',
        'specifications.*.specification_id' => 'required|int',
        'specifications.*.spec_value' => 'required|string',
        'features.*.feature_id' => 'required|int',
        'features.*.feat_value' => 'required|string',
        'medias.*.media_path' => 'required|file' // Validation pour les fichiers (images)
    ];

    // Appel à la méthode du trait pour la validation et gestion des exceptions
    return $this->validateAndHandle($request, $rules, function ($data) {
        // Création du véhicule
        $vehicule = Vehicule::create($data["vehicule"]);

        if ($vehicule) {
            // Gestion des spécifications
            if ($data["specifications"]) {
                foreach ($data["specifications"] as $spec) {
                    $spec["vehicule_id"] = $vehicule->id;
                    VehiculeSpecification::create($spec);
                }
            }

            // Gestion des fonctionnalités
            if ($data["features"]) {
                foreach ($data["features"] as $feat) {
                    $feat["vehicule_id"] = $vehicule->id;
                    VehiculeFeature::create($feat);
                }
            }

            // Gestion du prix de location
            if ($data["location_price"]) {
                $data["location_price"]["vehicule_id"] = $vehicule->id;
                VehiculeLocationPrice::create($data["location_price"]);
            }

            // Gestion du prix de vente
            if ($data["sell_price"]) {
                $data["sell_price"]["vehicule_id"] = $vehicule->id;
                VehiculeSellPrice::create($data["sell_price"]);
            }

            // Sauvegarde des médias (images)
            if ($data["medias"]) {
                foreach ($data["medias"] as $media) {
                    if ($media['media_path']->isValid()) {
                        // Gérer le stockage des images
                        $path = $media['media_path']->store('public/vehicules'); // Enregistre dans le dossier 'vehicules'
                        $mediaPath = basename($path); // Nom du fichier
                        // Sauvegarde du chemin du média dans la base de données
                        VehiculeMedia::create([
                            'vehicule_id' => $vehicule->id,
                            'media_path' => url('storage/vehicules/' . $mediaPath)
                        ]);
                    }
                }
            }
        }
        return $vehicule;
    });
    }


}
