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
            'value' => 'acheteur'
        ]);

        DB::table('client_types')->insert([
            'value' => 'vendeur'
        ]);

        DB::table('client_types')->insert([
            'value' => 'acheteurVendeur'
        ]);
    }
}
