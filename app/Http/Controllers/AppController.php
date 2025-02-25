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
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

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
        ->orderBy("id", "DESC")->get();
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
            'vehicule.sell' => 'nullable|string',
            'vehicule.loan' => 'nullable|string',
            'specifications.*.specification_id' => 'required|int',
            'specifications.*.spec_value' => 'required|string',
            'features.*.feature_id' => 'required|int',
            'features.*.feat_value' => 'required|string',
            'medias' => 'required|array', // Validation pour les fichiers (images)
            'medias.*.media_path' => 'required|file' // Validation pour les fichiers (images)
        ];
        try {
            // Validation des données
            $data = $request->validate($rules);

            // Exécution de la logique de callback avec les données validées
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

            // Retourner la réponse en JSON en cas de succès
            return response()->json(["result" => [
                "status"=>"success",
                "result" => $vehicule
            ]]);

        } catch (ValidationException $e) {
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
