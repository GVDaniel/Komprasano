<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([  
            'name' => 'Alimentos',
        ]);
        DB::table('categories')->insert([  
            'name' => 'Bebidas',
        ]);
        DB::table('categories')->insert([  
            'name' => 'Electricos',
        ]);
    }
}
