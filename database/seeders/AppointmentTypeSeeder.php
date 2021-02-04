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
            'value' => 'Premier contact achat'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Premier contact vente'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Visite achat'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Visite vente'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Modification souhait achat'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Modification souhait vente'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Achat'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Vente'
        ]);

        DB::table('appointment_types')->insert([
            'value' => 'Autres'
        ]);
    }
}
