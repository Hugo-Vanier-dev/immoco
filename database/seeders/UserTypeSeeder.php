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
            'id' => 1,
            'value' => 'admin'
        ]);

        DB::table('user_types')->insert([
            'id' => 2,
            'value' => 'manager'
        ]);

        DB::table('user_types')->insert([
            'id' => 3,
            'value' => 'vendeur'
        ]);

        DB::table('user_types')->insert([
            'id' => 4,
            'value' => 'secrétaire'
        ]);
    }
}
