<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment_types')->insert([
            'id' => 1,
            'value' => 'Premier contact achat'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 2,
            'value' => 'Premier contact vente'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 3,
            'value' => 'Visite achat'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 4,
            'value' => 'Visite vente'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 5,
            'value' => 'Modification souhait achat'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 6,
            'value' => 'Modification souhait vente'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 7,
            'value' => 'Achat'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 8,
            'value' => 'Vente'
        ]);

        DB::table('appointment_types')->insert([
            'id' => 9,
            'value' => 'Autres'
        ]);
    }
}
