<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contribution;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Contribution::class, function (Faker $faker) {
    return [
        'user_id'=>'1',
        'amount'=>'400',
        'date'=>$faker->date()
    ];
});
