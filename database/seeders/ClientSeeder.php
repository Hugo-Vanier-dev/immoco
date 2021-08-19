<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'id' => 1,
            'lastname' => 'Vanier De Saint Aunay',
            'firstname' => 'Hugo',
            'mail' => 'hugovanierdesaintaunay@gmail.com',
            'zipCode' => '80000',
            'streetNumber' => '44',
            'city' => 'Amiens',
            'birthdate' => null, 
            'streetName' => 'Boulevard des Fédérées',
            'description' => 'Hugo est un jeune célibataire cherchant un logement dans le centre d\'Amiens',
            'cellphone' => '0782209987',
            'phone' => '0344390216',
            'client_type_id' => 2,
            'user_id' => 1,
            'sexe' => 1
        ]);
    }
}
