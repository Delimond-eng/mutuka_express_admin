<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use App\Models\Feature;
use App\Models\Specification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            "name"=> "Administrator",
            "email"=>"admin@mutukaexpress.com",
            "password"=>bcrypt("12345")
        ]);


        $brands = [
            'Toyota',
            'Honda',
            'Ford',
            'BMW',
            'Mercedes-Benz',
            'Chevrolet',
            'Nissan',
            'Audi',
            'Volkswagen',
            'Peugeot',
            'Renault',
            'Fiat',
            'Tesla',
            'Mazda',
            'Hyundai',
            'Kia',
            'Subaru',
            'Jaguar',
            'Porsche',
            'Lexus',
            'Land Rover',
            'Mitsubishi',
            'Ferrari',
            'Lamborghini',
            'Bugatti',
            'Aston Martin',
            'Bentley',
            'Rolls-Royce',
            'McLaren',
            'Chrysler',
            'Dodge',
            'Jeep',
            'Buick',
            'GMC',
            'Cadillac',
            'Acura',
            'Infiniti',
            'Lincoln',
            'Alfa Romeo',
            'Citroën',
            'Opel',
            'Skoda',
            'Saab',
            'Seat',
            'Suzuki',
            'Isuzu',
            'Chery',
            'Great Wall',
            'BYD',
            'Tata Motors',
            'Mahindra',
            'Peugeot',
            'Haval',
        ];

        foreach ($brands as $brand) {
            CarBrand::create([
                'libelle' => $brand,
            ]);
        }

        $specifications = [
            'Carrosserie' => 'Sedan',
            'Sièges' => '2 sièges',
            'Portes' => '2 portes',
            'Bagages' => '150',
            'Type de carburant' => 'Hybride',
            'Moteur' => '3000',
            'Année' => '2020',
            'Kilométrage' => '200',
            'Transmission' => 'Automatique',
            'Traction' => '4WD',
            'Consommation de carburant' => '18.5',
            'Couleur extérieure' => 'Bleu métallisé',
            'Couleur intérieure' => 'Noir',
        ];

        foreach ($specifications as $libelle => $value) {
            Specification::create([
                'libelle' => $libelle,
                'status' => 'actif',
            ]);
        }


        $features = [
            'Bluetooth',
            'Lecteur multimédia',
            'Verrouillage centralisé',
            'Toit ouvrant',
        ];

        foreach ($features as $libelle) {
            Feature::create([
                'libelle' => $libelle,
                'status' => 'actif',
            ]);
        }
    }
}
