<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mohammad',
            'email' => 'mohammad.assad0101@gmail.com',
            'password' => '123456789',
            'mobile' => '0777777777',
            'address' => 'Irbid',
            
        ]);
        User::create([
            'name' => 'Abeda',
            'email' => 'jarrahabeda@gmail.com',
            'password' => '123456789',
            'mobile' => '0777777777',
            'address' => 'Irbid',
            
        ]);
        User::create([
            'name' => 'Salam',
            'email' => 'sm980434@gmail.com',
            'password' => '123456789',
            'mobile' => '0777777777',
            'address' => 'Irbid',
            
        ]);
        User::create([
            'name' => 'Marah',
            'email' => 'mmabusaleh18@cit.just.edu.jo',
            'password' => '123456789',
            'mobile' => '0777777777',
            'address' => 'Irbid',
            
        ]);
        User::create([
            'name' => 'Raghad',
            'email' => 'raghad.taha198@gmail.com',
            'password' => '123456789',
            'mobile' => '0777777777',
            'address' => 'Irbid',
            
        ]);
        User::create([
            'name' => 'Mohammad bany saleh',
            'email' => 'banysaleh99@gmail.com',
            'password' => '123456789',
            'mobile' => '0777777777',
            'address' => 'Irbid',
            
        ]);
    }
}
