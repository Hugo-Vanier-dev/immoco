<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            'id' => 1,
            'price' => 98500,
            'label' => 'Magnifique 35m² à Saint-Roch',
            'description' => 'Appartement équipé de 35m² à seulement 5min de la gare Saint Roch à pied',
            'longitude' => 49.895693,
            'latitude' => 2.283586,
            'city' => 'Amiens',
            'adress' => '44 boulevard des Fédérés',
            'zipcode' => '80000',
            'livingArea' => 35,
            'area' => 35,
            'piecesNumber' => 4,
            'bedroomNumber' => 1,
            'bathRoomNumber' => 1,
            'wcNumber' => 1,
            'buildingNumber' => '44',
            'bearing' => 3,
            'garden' => false,
            'garage' => false,
            'cellar' => false,
            'atic' => false,
            'parking' => false,
            'opticalFiber' => true,
            'swimmingPool' => false,
            'balcony' => false,
            'client_id' => 1,
            'property_type_id' => 2
        ]);

        $id = DB::getPdo()->lastInsertId();
        DB::table('properties_heater_types')->insert([
            'property_id' => $id,
            'heater_type_id' => 8
        ]);

        DB::table('properties_heater_types')->insert([
            'property_id' => $id,
            'heater_type_id' => 9
        ]);

        DB::table('properties_shutter_types')->insert([
            'property_id' => $id,
            'shutter_type_id' => 4
        ]);

        DB::table('properties_shutter_types')->insert([
            'property_id' => $id,
            'shutter_type_id' => 1
        ]);

    }
}
