<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
    	$number = 200; 
        $this->call([
            EquiposTableSeeder::class,
            PartidosTableSeeder::class,
        ]);

        factory(App\User::class, 1)->states('myown')->create();
    	factory(App\User::class, $number)->create();
    
    }

}
