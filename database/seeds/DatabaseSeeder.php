<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(SellerAddressesTableSeeder::class);
        //$this->call(SellersTableSeeder::class);
        //$this->call(LabelsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
