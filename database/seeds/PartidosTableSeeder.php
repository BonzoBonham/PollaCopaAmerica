<?php

use Illuminate\Database\Seeder;
use App\Partido;
use App\Equipo;

class PartidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->partidosFaseDeGrupos();
        $this->partidosFaseDeEliminacion();
    }

    public function partidosFaseDeEliminacion(){
        $ppr = array(4,2,1,1);
        $rondas = array('cuartos', 'semifinales','tercero', 'final');
         for ($i=0; $i < 4; $i++) { 
            for ($j=0; $j < $ppr[$i] ; $j++) { 
                $partido = factory(App\Partido::class)->states($rondas[$i])->create();
                DB::table('equipo_partido')->insert(
                    [
                        'partido_id' => $partido->id,
                        'equipo_id' => rand(1, 12)
                    ]
                );
                DB::table('equipo_partido')->insert(
                    [
                        'partido_id' => $partido->id,
                        'equipo_id' => rand(1, 12)
                    ]
                );
            }
         }
    }


    /**
     * Makes a insert of 2 records in the intemediate table equipos_partidos
     *
     * @return void
     */
    public function insertEquiposPartidos($eq1, $eq2){
        $partido = factory(App\Partido::class)->states('grupos')->create();
           DB::table('equipo_partido')->insert(
                [
                    'partido_id' => $partido->id,
                    'equipo_id' => Equipo::select('id')->where('nombre',$eq1)->first()->id
                ]
            );
           DB::table('equipo_partido')->insert(
                [
                    'partido_id' => $partido->id,
                    'equipo_id' => Equipo::select('id')->where('nombre',$eq2)->first()->id
                ]
            );
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
            array('Uruguay','Ecuador','Japon','Chile')
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
                $a = array($grupo[$i],$grupo[$j]);
                call_user_func_array (array($this, "insertEquiposPartidos"), $a);
            }
        }
    }
}
