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
        $labels = factory(App\Label::class, 5)->create();
        $sellers = factory(App\Seller::class, 2)
            ->create()
            ->each(function ($seller) use ($labels) {
                factory(App\Product::class, 3)
                    ->create(['seller_id' => $seller->id])
                    ->each(function ($product) use ($labels) {
                        $product->labels()->attach($labels[rand(0,4)]->id);
                        $product->labels()->attach($labels[rand(0,4)]->id);

                        factory(App\Review::class, 10)->create(['product_id' => $product->id]);
                        });
                    });
    }
}
