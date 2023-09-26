<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donation;


class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Donation::truncate();

        Donation::create([
            'category_id' => '1',
            'name' => 'First Choice',
            'description' => 'You can donate the value of a coupon, every one will equal the value of a meal in one of our partners restaurants.',
            'price' => '50',
            'image' => '1',


        ]);
        Donation::create([
            'category_id' => '1',
            'name' => 'Second Choice',
            'description' => 'You can donate the value of a coupon, every one will equal the value of a meal in one of our partners restaurants.',
            'price' => '100',
            'image' => '1',

        ]);
        Donation::create([
            'category_id' => '2',
            'name' => 'First Choice',
            'description' => 'You can donate the value of a coupon, every one will equal the value of a meal in one of our partners restaurants.',
            'price' => '50',
            'image' => '1',

        ]);
        Donation::create([
            'category_id' => '2',
            'name' => 'Second Choice',
            'description' => 'You can donate the value of a coupon, every one will equal the value of a meal in one of our partners restaurants.',
            'price' => '200',
            'image' => '1',

        ]);
        Donation::create([
            'category_id' => '3',
            'name' => 'First Choice',
            'description' => 'You can donate the value of a coupon, every one will equal the value of a meal in one of our partners restaurants.',
            'price' => '50',
            'image' => '1',

        ]);
        Donation::create([
            'category_id' => '3',
            'name' => 'Second Choice',
            'description' => 'You can donate the value of a coupon, every one will equal the value of a meal in one of our partners restaurants.',
            'price' => '90',
            'image' => '1',

        ]);
    }
}
