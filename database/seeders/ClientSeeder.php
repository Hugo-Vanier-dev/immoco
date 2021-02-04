<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'lastname' => 'Vanier De Saint Aunay',
            'firstname' => 'Hugo',
            'mail' => 'hugovanierdesaintaunay@gmail.com',
            'cellphone' => '0782209987',
            'phone' => '0344390216',
            'client_type_id' => 2,
            'user_id' => 1
        ]);
    }
}
