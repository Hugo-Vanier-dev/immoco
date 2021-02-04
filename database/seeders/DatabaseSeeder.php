<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AppointmentTypeSeeder::class,
            ClientTypeSeeder::class,
            HeaterTypeSeeder::class,
            ShutterTypeSeeder::class,
            PropertyTypeSeeder::class,
            UserTypeSeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            AppointmentSeeder::class,
            PropertySeeder::class,
            clientWishSeeder::class
        ]);
    }
}
