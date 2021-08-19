<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            'city' => 'Amiens',
            'address' => '44 boulevard des Fédérés',
            'description' => 'Visite pour un achat',
            'date' => '2021-02-17T09:00:00',
            'appointment_type_id' => 1,
            'user_id' => 1,
            'client_id' => 1,
        ]);
    }
}
