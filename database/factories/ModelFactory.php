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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName($gender = null|'male'|'female'),
        'last_name' => $faker->lastname,
        'DOB' => $faker ->date($format = 'Y-m-d', $max = 'now'),
        'mobile_number' => str_random(10),
        'user_type' => $faker->randomDigit, // bad idea breaks logic,it has to be 1 0r 2
        'institution' => $faker->catchPhrase,
        'api_token' => $faker->sha1,
        'gl_code' => str_random(5),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
