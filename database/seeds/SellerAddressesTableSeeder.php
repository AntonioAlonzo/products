<?php

use App\SellerAddress;
use Illuminate\Database\Seeder;

class SellerAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfAddresses = 2;
        factory(\App\SellerAddress::class, $numOfAddresses)->create();
    }
}
