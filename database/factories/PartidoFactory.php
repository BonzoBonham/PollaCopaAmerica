<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Partido;
use Faker\Generator as Faker;

$factory->define(Partido::class, function (Faker $faker) {
	$lugares = array (
		'Estadio Minerao, Bello Horizonte',  
		'Arena do Gremio, Porto Alegre',
		'Estadio do Marcana, Rio de Janeiro',
		'Arena Fonte Nova, Salvador', 
		'Arena Corinthians, Sao Paulo',
		'Estadio Morumbi, Sao Paulo'
	);
    return [
        'resultado' => $faker->randomDigit, 
        'lugar' => $faker->randomElement($lugares) ,
        'descripcion' => $faker->sentence(12) , 

    ];
});
