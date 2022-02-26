<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'Khanh Dinh',
            'email' => 'dinhnguyenkhanh210401@gmail.com',
            'password' => Hash::make('nguyenkhanh2104'),
        ]);

        $categories = [
            ['name' => 'Coding'],
            ['name' => 'Interview'],
            ['name' => 'Random'],
            ['name' => 'Math'],
            ['name' => 'Algorithm'],
            ['name' => 'Laravel'],
            
        ];
        DB::table('categories')->insert($categories);
    }
}
