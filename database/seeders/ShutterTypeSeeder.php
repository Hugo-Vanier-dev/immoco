<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShutterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shutter_types')->insert([
            'value' => 'Volets battants'
        ]);

        DB::table('shutter_types')->insert([
            'value' => 'Volets pliants'
        ]);

        DB::table('shutter_types')->insert([
            'value' => 'Volets roulants'
        ]);

        DB::table('shutter_types')->insert([
            'value' => 'Volets coulissants'
        ]);

        DB::table('shutter_types')->insert([
            'value' => 'Pas de volets'
        ]);

        DB::table('shutter_types')->insert([
            'value' => 'Autres'
        ]);
    }
}
