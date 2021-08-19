<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'lastname' => 'Romanov',
            'firstname' => 'Suzie',
            'mail' => 'suzie.romanov@immoco.fr',
            'username' => 'suzieRo',
            'cellphone' => '0699966600',
            'password' => Hash::make('suzieRo'),
            'user_type_id' => 1,
            'sexe' => 1
        ]);
    }
}
