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
        // $this->call(UsersTableSeeder::class);

        factory(App\User::class, 1)->states('myown')->create();
    	factory(App\User::class, $number)->create();
    	factory(App\Partido::class, $number)->create();
        $this->insertEquipos();
    }

    public function insertEquipos(){
         $equipos  = array( 'Brazil', 'Bolivia','Venezuela','Peru', 'Argentina', 'Colombia','Paraguay','Qatar', 'Uruguay','Ecuador','Japan','Chile');
        foreach ($equipos as &$equipo )  { 
            DB::table('equipos')->insert(
                ['nombre' => $equipo ]
            );
        }
    }
}
