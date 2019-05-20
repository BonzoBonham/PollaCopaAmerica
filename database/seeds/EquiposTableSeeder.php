<?php

use Illuminate\Database\Seeder;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->makeEquipos();
    }



    public function makeEquipos(){ 
        $abc = array('A','B', 'C');
        $grupos  = array( 
            array('Brazil', 'Bolivia','Venezuela','Peru'), 
            array('Argentina', 'Colombia','Paraguay','Qatar'),
            array('Uruguay','Ecuador','Japon','Chile')
        );

        for ($row = 0; $row < 3; $row++) {
            $this->insertEquipos($abc[$row], $grupos[$row]);
        }
    }
     /**
     * Makes a insert of 12 teams into database
     *
     * @return void
     */
    public function insertEquipos($a, $equipos){ 
        foreach ($equipos as &$equipo )  {
            DB::table('equipos')->insert(
                [
                    'grupo' => $a,
                    'nombre' => $equipo,
                    'bandera' => 'images/flags/'.strtolower($equipo) . '.svg',
                ]
            );
        }
    }
}
