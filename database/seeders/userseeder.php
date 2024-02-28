<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       DB::table('users')->insert([
            'userType'=>'1',
            'name'=>'Divyansh',
            'email'=>'devkakkar82@gmail.com',
            'password'=>Hash::make('123456'),
            'mobile'=>'9034500831',
            'image'=>'Divyansh.jpg'
       ]);
       return "run called";
    }
}
