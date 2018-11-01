<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456),
            'role' => 1
        ]);

        App\User::create([
            'name' => 'nguyen anh tu',
            'email' => 'nguyentu@gmail.com',
            'password' => bcrypt(123456),
            'role' => 2
        ]);
    }
}
