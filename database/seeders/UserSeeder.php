<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Antonius Wisnu',
            'email' => 'email@email.com',
            'password' => Hash::make('wisnu321'),
            'level' => 'admin',
            
        ]);

        DB::table('users')->insert([
            'name' => 'Wisnu Biasa',
            'email' => 'emailuser@email.com',
            'password' => Hash::make('wisnu123'),
            'level' => 'user',
            
        ]);
    }
}
