<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            'name' => 'pasabocas',
        ]);
        DB::table('resources')->insert([
            'name' => 'otro',
        ]);
        DB::table('resources')->insert([
            'name' => 'otro',
        ]);
    }
}
