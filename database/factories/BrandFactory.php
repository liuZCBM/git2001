<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Brand::class, function (Faker $faker) {
    return [
            'brand_name' => "天猫",
            'brand_log' => 'http://2001.com/upload/cl2EElnoBnY2Q6H2bq1FRdzl8JejOj3AFqxWzd5G.jpeg',
            'brand_url' => "www.tianmao.com",
            'brand_desc' => "剑荡四方",
    ];
});
