<?php

use Illuminate\Database\Seeder;
use App\Partido;
use App\Equipo;

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
    	factory(App\Partido::class, 26)->create();
        $this->insertEquipos();
        //$this->partidosFaseDeGrupos();
    }

    public function insertEquipos(){
         $equipos  = array( 'Brazil', 'Bolivia','Venezuela','Peru', 'Argentina', 'Colombia','Paraguay','Qatar', 'Uruguay','Ecuador','Japan','Chile');
        foreach ($equipos as &$equipo )  {
            DB::table('equipos')->insert(
                ['nombre' => $equipo ]
            );
        }
    }
     public function insertEquiposPartidos($equipos){
        foreach ($equipos as &$equipo) {
           DB::table('equipos_partidos')->insert(
                [
                    'partido_id' => Partido::select('id')->orderByRaw("RAND()")->first()->id,
                    'equipo_id' => Equipo::select('id')->where('nombre',$equipo)->id
                ]
            );
        }
    }

    public function partidosFaseDeGrupos(){
        $grupos  = array( 
            array('Brazil', 'Bolivia','Venezuela','Peru'), 
            array('Argentina', 'Colombia','Paraguay','Qatar'),
            array('Uruguay','Ecuador','Japan','Chile')
        );
        for ($row = 0; $row < 3; $row++) {
            $this->partidosFDG($grupos[$row]);
        }

    }
    public function partidosFDG(array $grupo){
        for ($i = 0; $i < sizeof($grupo); $i++) { 
            for ($j = $i+1; $j < sizeof($grupo); $j++) { 
                $a = array();
                array_push($a,$grupo[$i],$grupo[$j]);
                insertEquiposPartidos();
            }
        }
    }

}
