<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat(2, 1, 1000),
        'description' => $faker->text()
    ];
});

$factory->define(\App\Label::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(\App\Review::class, function (Faker\Generator $faker) {
    return [
        'reviewer_name' => $faker->name,
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'content' => $faker->text(),
        'date' => $faker->date('Y-m-d')
    ];
});

$factory->define(\App\Seller::class, function (Faker\Generator $faker) {  
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
        'seller_address_id' => factory(App\SellerAddress::class)->create()->id
    ];
});

$factory->define(\App\SellerAddress::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'postal_code' => $faker->postcode
    ];
});
