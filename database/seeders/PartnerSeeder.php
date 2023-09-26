<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'name' => 'Unicef',
            'image' => 'images/causes/unicef.png',
        ]);
        Partner::create([
            'name' => 'Jordan River Foundation',
            'image' => 'images/causes/p2.png',
        ]);
        Partner::create([
            'name' => 'National Aid Fund',
            'image' => 'images/causes/p4.png',
        ]);
        Partner::create([
            'name' => 'Tkiyet Um Ali',
            'image' => 'images/causes/p5.png',
        ]);
        Partner::create([
            'name' => 'Careem',
            'image' => 'images/causes/p66.png',
        ]);
        Partner::create([
            'name' => 'World Food Programm',
            'image' => 'images/causes/p11.png',
        ]);
        Partner::create([
            'name' => 'Talabat',
            'image' => 'images/causes/talabat.png',
        ]);
        Partner::create([
            'name' => 'Food and Drug Administration',
            'image' => 'images/causes/p10.png',
        ]);
    }
}
