<?php

namespace Database\Seeders;

use App\Models\Donation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Donation::truncate();
       // Donation::truncate();
        Donation::create([
            'category_id' => 1, 
                'name' => 'First package',
                'description' => 'This package contains: milk, rice, suger, floure, oil, tuna, seeds and coconut',
                'price' => 70,
                'image' => 'images\donation\package 4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 1, 
                'name' => 'Second package',
                'description' => 'This package contains: spaghetti, milk, rice, suger, floure, oil and meat',
                'price' => 50,
                'image' => 'images\donation\package 5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 1, 
                'name' => 'Third package',
                'description' => 'This package contains: bread, milk, rice, suger, floure, oil and meat',
                'price' => 90,
                'image' => 'images\donation\package 1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 1, 
                'name' => 'Fourth package',
                'description' => 'This package contains: milk, rice, suger, floure, oil and meat',
                'price' => 75,
                'image' => 'images\donation\package 3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 1, 
                'name' => 'Fifth package',
                'description' => 'This package contains: milk, rice, suger, floure, oil and meat',
                'price' => 60,
                'image' => 'images\donation\package 10.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 1, 
                'name' => 'Sixth package',
                'description' => 'This package contains: milk, rice, suger, floure, oil and meat',
                'price' => 30,
                'image' => 'images\donation\package 11.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 1, 
                'name' => 'Seventh package',
                'description' => 'This package contains:vegitables, milk, rice, suger, floure, oil and meat',
                'price' => 65,
                'image' => 'images\donation\package 12.png',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 1, 
                'name' => 'Eighth package',
                'description' => 'This package contains: milk, rice, suger, floure, oil and meat',
                'price' => 40,
                'image' => 'images\donation\package 13.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);

/////////// daily meels start
        Donation::create([
            'category_id' => 2, 
                'name' => 'Kabse',
                'description' => 'This meal contains rice and chicken, water, and salad _for one person_',
                'price' => 5,
                'image' => 'images\donation\daily 1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2, 
                'name' => 'Ouzi',
                'description' => 'This meal contains rice and chicken, and salad _for one person_',
                'price' => 3,
                'image' => 'images\donation\daily 2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2, 
                'name' => 'Grilled Chicken',
                'description' => 'This meal contains full chicken, mayonnaise, ketchup and pickles _for two person_',
                'price' => 6,
                'image' => 'images\donation\daily 3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2, 
                'name' => 'Ouzi',
                'description' => 'This meal contains rice, chicken, and salad _for two person_',
                'price' => 5,
                'image' => 'images\donation\daily 4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2, 
                'name' => 'Beriany',
                'description' => 'This meal contains rice, chicken, and yogurt _for one person_',
                'price' => 4,
                'image' => 'images\donation\daily 5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2, 
                'name' => 'Rice with souce',
                'description' => 'This meal contains rice, meat, and sweet papper _for one person_',
                'price' => 4.5,
                'image' => 'images\donation\daily 6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        
        Donation::create([
                'category_id' => 2, 
                'name' => 'Kabse',
                'description' => 'This meal contains rice and chicken, water, and salad _for one person_',
                'price' => 5,
                'image' => 'images\donation\daily 1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2, 
                'name' => 'Ouzi',
                'description' => 'This meal contains rice and chicken, and salad _for one person_',
                'price' => 3,
                'image' => 'images\donation\daily 2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
        ]);

 //////////// coupons start
        Donation::create([
            'category_id' => 2,
            'name' => 'Kabse',
            'description' => 'This meal contains rice and chicken, water, and salad _for one person_',
            'price' => 5,
            'image' => 'images\donation\daily 1.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 2,
            'name' => 'Ouzi',
            'description' => 'This meal contains rice and chicken, and salad _for one person_',
            'price' => 3,
            'image' => 'images\donation\daily 2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //////////// coupons start
        Donation::create([
            'category_id' => 3,
            'name' => 'First coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 2,
            'image' => 'images\donation\restu 1.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 3,
            'name' => 'Second coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 3,
            'image' => 'images\donation\restu 2.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 3,
            'name' => 'Third coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 5,
            'image' => 'images\donation\restu 3.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 3,
            'name' => 'Fourth coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 3,
            'image' => 'images\donation\restu 4.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 3,
            'name' => 'Fifth coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 4,
            'image' => 'images\donation\restu 5.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 3,
            'name' => 'Sixth coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 6,
            'image' => 'images\donation\restu 6.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Donation::create([
            'category_id' => 3,
            'name' => 'Seventh coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 3,
            'image' => 'images\donation\restu 7.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 3,
            'name' => 'Eighth coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 4,
            'image' => 'images\donation\restu 8.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Donation::create([
            'category_id' => 3,
            'name' => 'Ninth coupon',
            'description' => 'The restaurant distributes these special coupons to customers through various channels',
            'price' => 6,
            'image' => 'images\donation\restu 9.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}


