<?php

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([  
            'id_category' => '1',
            'icon' => 'frutas.png',
            'name' => 'Frutas',
            'description' => 'Frutas frescas de la región',
            'status' => '1',
        ]);
        DB::table('sub_categories')->insert([  
            'id_category' => '1',
            'icon' => 'verduras.png',
            'name' => 'Verduras',
            'description' => 'Verduras frescas de la región',
            'status' => '1',
        ]);
        DB::table('sub_categories')->insert([  
            'id_category' => '1',
            'icon' => 'dulces.png',
            'name' => 'Dulces',
            'description' => 'Dulceria artesanal',
            'status' => '1',
        ]);
        DB::table('sub_categories')->insert([  
            'id_category' => '2',
            'icon' => 'jugos.png',
            'name' => 'Jugos',
            'description' => 'Jugos naturales en vidrio',
            'status' => '1',
        ]);
        DB::table('sub_categories')->insert([  
            'id_category' => '2',
            'icon' => 'pulpas.png',
            'name' => 'Pulpas',
            'description' => 'Pulpas de fruta para jugos',
            'status' => '1',
        ]);
        DB::table('sub_categories')->insert([  
            'id_category' => '3',
            'icon' => 'bicicletas.png',
            'name' => 'Bicicletas Electricas',
            'description' => 'Biciletas electricas',
            'status' => '1',
        ]);
    }
}
