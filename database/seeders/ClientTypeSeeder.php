<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_types')->insert([
            'id' => 1,
            'value' => 'acheteur'
        ]);

        DB::table('client_types')->insert([
            'id' => 2,
            'value' => 'vendeur'
        ]);

        DB::table('client_types')->insert([
            'id' => 3,
            'value' => 'acheteurVendeur'
        ]);
    }
}
