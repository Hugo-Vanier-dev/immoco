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
            'value' => 'Cheminée feu de bois'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Insert feu de bois'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Poêle à bois'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Poêle à granulés'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière bois'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Pompe à chaleur air/air'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Pompe à chaleur air/eau'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Pompe à chaleur géothermique'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Pompe à chaleur hydrothermique'
        ]);
        

        DB::table('heater_types')->insert([
            'value' => 'Chaudière fioul standard'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière fioul à condensation'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière fioul basse température'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière fioul à ventouse'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière fioul micro cogénération'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière mixte'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière au gaz standard'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière au gaz à condensation'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chaudière au gaz basse température'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chauffage au sol'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Chauffage électrique'
        ]);

        DB::table('heater_types')->insert([
            'value' => 'Autres'
        ]);
    }
}
