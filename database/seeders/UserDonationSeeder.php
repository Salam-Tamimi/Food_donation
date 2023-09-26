<?php

namespace Database\Seeders;
use App\Models\UserDonation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDonation::create([
            'user_id' => '1',
            'donation_id' => '1',
            'quantity' => '1',
            'description' => 'Hi',

        ]);
    }
}
