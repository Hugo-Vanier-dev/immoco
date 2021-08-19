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
            'id' => 1,
            'value' => 'T1',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 2,
            'value' => 'T2',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 3,
            'value' => 'T3',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 4,
            'value' => 'T4',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 5,
            'value' => 'T5',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 6,
            'value' => 'Loft',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 7,
            'value' => 'Duplex',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 8,
            'value' => 'Triplex',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 9,
            'value' => 'Souplex',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 10,
            'value' => 'Autres',
            'isAppartement' => 1
        ]);

        DB::table('property_types')->insert([
            'id' => 11,
            'value' => 'Maison à étages',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 12,
            'value' => 'Maison à toit plat',
            'isAppartement' => 0
        ]);
        
        DB::table('property_types')->insert([
            'id' => 13,
            'value' => 'Maison bioclimatique',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 14,
            'value' => 'Maison duplex',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 15,
            'value' => 'Maison en bois',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 16,
            'value' => 'Maison en lotissement',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 17,
            'value' => 'Maison en pierres apparentes',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 18,
            'value' => 'Maison en VEFA',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 19,
            'value' => 'Maison évolutive',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 20,
            'value' => 'Maison individuelle classique',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 21,
            'value' => 'Maison coloniale',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 22,
            'value' => 'Maison jumelées',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 23,
            'value' => 'Maison de type loft',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 24,
            'value' => 'Maison longères',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 25,
            'value' => 'Maison meulières',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 26,
            'value' => 'Maison phénix',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 27,
            'value' => 'Maison prête à finir',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 28,
            'value' => 'Maison plain-pied',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 29,
            'value' => 'Mas de provence',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 30,
            'value' => 'Maison en briques traditionnelle',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 31,
            'value' => 'Maison Victorienne',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 32,
            'value' => 'Maison insolite',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 33,
            'value' => 'Villa',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 34,
            'value' => 'Chateau',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 35,
            'value' => 'Terrain constructible',
            'isAppartement' => 0
        ]);

        DB::table('property_types')->insert([
            'id' => 36,
            'value' => 'Autres',
            'isAppartement' => 0
        ]);
    }
}
