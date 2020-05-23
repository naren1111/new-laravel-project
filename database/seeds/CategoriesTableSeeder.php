<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'wordpress',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'php',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'javascript',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'java',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'c++',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'laravel',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'css',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'bootstrap',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'react js',
            'created' => '1',
            'update' => '1',
        ]);
        DB::table('categories')->insert([
            'name' => 'python',
            'created' => '1',
            'update' => '1',
        ]);
        
    }
}
