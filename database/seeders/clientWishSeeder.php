<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clientWishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_wishes')->insert([
            'price' => 120000,
            'opticalFiber' => true,
            'client_id' => 1
        ]);

        $id = DB::getPdo()->lastInsertId();
        DB::table('client_wishes_heater_types')->insert([
            'client_wish_id' => $id,
            'heater_type_id' => 8
        ]);

        DB::table('client_wishes_heater_types')->insert([
            'client_wish_id' => $id,
            'heater_type_id' => 9
        ]);

        DB::table('client_wishes_shutter_types')->insert([
            'client_wish_id' => $id,
            'shutter_type_id' => 8
        ]);

        DB::table('client_wishes_shutter_types')->insert([
            'client_wish_id' => $id,
            'shutter_type_id' => 9
        ]);
    }
}
