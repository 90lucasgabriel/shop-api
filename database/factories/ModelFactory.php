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

/** @var \Illuminate\Database\Eloquent\Factory $factory 
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/

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

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->word
    ];
});

$factory->define(App\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone'             => $faker->phoneNumber,
        'address'           => $faker->address,
        'city'              => $faker->city,
        'state'             => $faker->state,
        'zipcode'           => $faker->postcode,
    ];
});

$factory->define(App\Models\Coupon::class, function (Faker\Generator $faker) {
    return [
        'code'              => rand(100, 10000),
        'value'             => rand(50, 100)
    ];
});

$factory->define(App\Models\OauthClient::class, function (Faker\Generator $faker) {
    $name         = $faker->name;
    $code         = md5($faker->name.uniqid(rand(), true));
    $id           = base64_encode(hash_hmac('sha256', $code, 'nameApplication', true));
    $secret       = base64_encode(hash_hmac('sha256', $code, 'secretApplication', true));

    return [
        'id'                => $id,
        'name'              => $name,
        'secret'            => $secret,        
        'password_client'        => 1,
        'personal_access_client' => 0,
        'redirect'               => '',
        'revoked'                => 0
    ];
});

$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'client_id'         => rand(1,10),
        'total'             => rand(50, 50),
        'status'            => 0
    ];
});

$factory->define(App\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' 				=> $faker->word,
        'description' 		=> $faker->sentence,
        'price' 			=> $faker->numberBetween(10, 50)
    ];
});

$factory->define(App\Models\ProductImage::class, function (Faker\Generator $faker) {
    $host     = 'http://lorempixel.com';
    $width    = rand(450, 650);
    $height   = rand(450, 650);
    $category = 'technics';
    $id       = rand(1, 10);
    
    $url      = $host . '/' . $width . '/' . $height . '/' . $category . '/' . $id;

    return [
        'url'               => $url,
        'description'       => $faker->sentence,
        'index'             => 0
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'        => $faker->name,
        'last_name'         => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'password'          => bcrypt(str_random(10)),
        'remember_token'    => str_random(10),
    ];
});