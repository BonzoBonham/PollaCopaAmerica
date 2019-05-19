<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Equipo;
use Faker\Generator as Faker;

$factory->define(Equipo::class, function (Faker $faker) {
	$equipos  = array(
		'Brazil',
		'Bolivia',
		'Venezuela',
		'Peru',
		'Argentina',
		'Colombia',
		'Paraguay',
		'Quatar',
		'Uruguay',
		'Ecuador',
		'Japan',
		'Chile',
	);
    return [

        'nombre' => $faker->randomElement($equipos),
        'grupo' => $faker->randomElement(array('a','b','c'))
    ];
});
