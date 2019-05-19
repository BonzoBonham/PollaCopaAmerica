<?php

use Illuminate\Database\Seeder;

class PartidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Partido::class, 26)->create();
    }

    /**
     * Makes a insert of 2 records in the intemediate table equipos_partidos
     *
     * @return void
     */
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

     /**
     * for each group call a method for make the matches 
     *
     * @return void
     */

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
    /**
     * find the combinations for a group
     *
     * @return void
     */
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
