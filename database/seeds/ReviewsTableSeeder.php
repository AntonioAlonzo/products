<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numOfReviews = 60;
        factory(\App\Review::class, $numOfReviews)->create();
    }
}
