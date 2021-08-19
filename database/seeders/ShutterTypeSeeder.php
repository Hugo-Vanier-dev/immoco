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
            'id' => 1,
            'value' => 'Volets battants'
        ]);

        DB::table('shutter_types')->insert([
            'id' => 2,
            'value' => 'Volets pliants'
        ]);

        DB::table('shutter_types')->insert([
            'id' => 3,
            'value' => 'Volets roulants'
        ]);

        DB::table('shutter_types')->insert([
            'id' => 4,
            'value' => 'Volets coulissants'
        ]);

        DB::table('shutter_types')->insert([
            'id' => 5,
            'value' => 'Pas de volets'
        ]);

        DB::table('shutter_types')->insert([
            'id' => 6,
            'value' => 'Autres'
        ]);
    }
}
