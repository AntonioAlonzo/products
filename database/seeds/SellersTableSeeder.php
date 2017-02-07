<?php

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfSellers = 2;
        factory(\App\Seller::class, $numOfSellers)->create();
    }
}
