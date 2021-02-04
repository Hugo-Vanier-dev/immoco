<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_types')->insert([
            'value' => 'T1',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'T2',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'T3',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'T4',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'T5',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'Loft',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'Duplex',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'Triplex',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'Souplex',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'Autres',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison à étages',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison à toit plat',
            'isAppartement' => 0
        ]);
        
        DB::table('property_types')->insert([
            'value' => 'Maison bioclimatique',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison duplex',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison en bois',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison en lotissement',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison en pierres apparentes',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison en VEFA',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison évolutive',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison individuelle classique',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison coloniale',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison jumelées',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison de type loft',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison longères',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison meulières',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison phénix',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison prête à finir',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison plain-pied',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Mas de provence',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison en briques traditionnelle',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison Victorienne',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Maison insolite',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Villa',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Chateau',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Terrain constructible',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'value' => 'Autres',
            'isAppartement' => 0
        ]);
    }
}
