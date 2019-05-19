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
    	'fase' => $faker->numberBetween(1,4),
        'resultado' => $faker->randomDigit, 
        'lugar' => $faker->randomElement($lugares) ,
        'descripcion' => $faker->sentence(12) , 

    ];
});

$factory->state(Partido::class, 'grupos',[
   'fase' => '1'
]);

$factory->state(Partido::class, 'cuartos', [
   'fase' => '2'
]);

$factory->state(Partido::class, 'semifinales', [
    'fase' => '3'
]);

$factory->state(Partido::class, 'tercero', [
    'fase' => '4'
]);

$factory->state(Partido::class, 'final', [
    'fase' => '5'
]);
