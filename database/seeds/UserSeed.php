<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
                'email' => 'admin@123.com',
                'password' => Hash::make('admin123'),
                'level' => 'admin',
            ]);
    }
}
