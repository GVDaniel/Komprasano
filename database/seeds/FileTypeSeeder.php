<?php

use Illuminate\Database\Seeder;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('file_types')->insert([
            'type' => 'Imagen',
        ]);

        DB::table('file_types')->insert([
            'type' => 'Video',
        ]);

        DB::table('file_types')->insert([
            'type' => 'Word',
        ]);

        DB::table('file_types')->insert([
            'type' => 'Excel',
        ]);

        DB::table('file_types')->insert([
            'type' => 'Pdf',
        ]);
    }
}
