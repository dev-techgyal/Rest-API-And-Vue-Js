<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;

$factory->define(\App\Article::class, function (Faker $faker) {
	return [
		'id' => Uuid::generate()->string,
		'title' => $faker->text(50),
		'body' => $faker->text(300),
	];
});
