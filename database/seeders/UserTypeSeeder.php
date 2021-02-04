<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'value' => 'admin'
        ]);

        DB::table('user_types')->insert([
            'value' => 'manager'
        ]);

        DB::table('user_types')->insert([
            'value' => 'vendeur'
        ]);

        DB::table('user_types')->insert([
            'value' => 'secrétaire'
        ]);
    }
}
