<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeaterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('heater_types')->insert([
            'id' => 1,
            'value' => 'Cheminée feu de bois'
        ]);

        DB::table('heater_types')->insert([
            'id' => 2,
            'value' => 'Insert feu de bois'
        ]);

        DB::table('heater_types')->insert([
            'id' => 3,
            'value' => 'Poêle à bois'
        ]);

        DB::table('heater_types')->insert([
            'id' => 4,
            'value' => 'Poêle à granulés'
        ]);

        DB::table('heater_types')->insert([
            'id' => 5,
            'value' => 'Chaudière bois'
        ]);

        DB::table('heater_types')->insert([
            'id' => 6,
            'value' => 'Pompe à chaleur air/air'
        ]);

        DB::table('heater_types')->insert([
            'id' => 7,
            'value' => 'Pompe à chaleur air/eau'
        ]);

        DB::table('heater_types')->insert([
            'id' => 8,
            'value' => 'Pompe à chaleur géothermique'
        ]);

        DB::table('heater_types')->insert([
            'id' => 9,
            'value' => 'Pompe à chaleur hydrothermique'
        ]);
        

        DB::table('heater_types')->insert([
            'id' => 10,
            'value' => 'Chaudière fioul standard'
        ]);

        DB::table('heater_types')->insert([
            'id' => 11,
            'value' => 'Chaudière fioul à condensation'
        ]);

        DB::table('heater_types')->insert([
            'id' => 12,
            'value' => 'Chaudière fioul basse température'
        ]);

        DB::table('heater_types')->insert([
            'id' => 13,
            'value' => 'Chaudière fioul à ventouse'
        ]);

        DB::table('heater_types')->insert([
            'id' => 14,
            'value' => 'Chaudière fioul micro cogénération'
        ]);

        DB::table('heater_types')->insert([
            'id' => 15,
            'value' => 'Chaudière mixte'
        ]);

        DB::table('heater_types')->insert([
            'id' => 16,
            'value' => 'Chaudière au gaz standard'
        ]);

        DB::table('heater_types')->insert([
            'id' => 17,
            'value' => 'Chaudière au gaz à condensation'
        ]);

        DB::table('heater_types')->insert([
            'id' => 18,
            'value' => 'Chaudière au gaz basse température'
        ]);

        DB::table('heater_types')->insert([
            'id' => 19,
            'value' => 'Chauffage au sol'
        ]);

        DB::table('heater_types')->insert([
            'id' => 20,
            'value' => 'Chauffage électrique'
        ]);

        DB::table('heater_types')->insert([
            'id' => 21,
            'value' => 'Autres'
        ]);
    }
}
