<?php

use Illuminate\Database\Seeder;

class AuthersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auther = new \App\Model\Author();
        $auther->id   = 1;
        $auther->name = "Fujiko Fujio";
        $auther->dob  = "1933-12-01";
        $auther->address  = "Japan";
        $auther->image  = 'doreamon.jpg';
        $auther->save();
        $auther = new \App\Model\Author();
        $auther->id   = 2;
        $auther->name = "Toriyama Akira";
        $auther->dob  = "1955-04-05";
        $auther->address  = "Japan";
        $auther->image  = 'dragonball.jpg';
        $auther->save();
        $auther = new \App\Model\Author();
        $auther->id   = 3;
        $auther->name = "Oda Eiichiro";
        $auther->dob  = "1975-01-01";
        $auther->address  = "Japan";
        $auther->image  = 'onepiece.jpg';
        $auther->save();
    }
}
