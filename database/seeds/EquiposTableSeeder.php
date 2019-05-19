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
         $this->insertEquipos();
    }
     /**
     * Makes a insert of 12 teams into database
     *
     * @return void
     */
    public function insertEquipos(){
         $equipos  = array( 'Brazil', 'Bolivia','Venezuela','Peru', 'Argentina', 'Colombia','Paraguay','Qatar', 'Uruguay','Ecuador','Japan','Chile');
        foreach ($equipos as &$equipo )  {
            DB::table('equipos')->insert(
                ['nombre' => $equipo ]
            );
        }
    }
}
