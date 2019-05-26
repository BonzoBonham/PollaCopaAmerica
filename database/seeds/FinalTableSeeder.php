<?php

use Illuminate\Database\Seeder;
use App\Partido;
use App\Equipo;
use App\Events\PartidoTerminado;

class FinalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->actualizarFinal();
    }
    public function actualizarFinal()
    {
    	$cuartos = App\Partido::fase(5)->get('id')->toArray();
		$this->actualizarPartido($cuartos[0]['id']);
    }
    public function actualizarTercero()
    {
    	$cuartos = App\Partido::fase(4)->get('id')->toArray();
		$this->actualizarPartido($cuartos[0]['id']);
    }
    public function actualizarPartido($partidoId)
    {
    	$equiposIds = DB::table('equipo_partido')
    						->select('equipo_id')
    						->where('partido_id', $partidoId)
    						->get()
    						->toArray();
    	$e1g = rand(0,6);
    	$e2g = rand(0,6);
    	if ( $e1g === $e2g) {
	    	$this->updatePartido($partidoId,$equiposIds[0]->equipo_id, $e1g ,2);
	    	$this->updatePartido($partidoId,$equiposIds[1]->equipo_id, $e2g ,2);
    	}elseif($e1g > $e2g){
    		$this->updatePartido($partidoId,$equiposIds[0]->equipo_id, $e1g ,1);
	    	$this->updatePartido($partidoId,$equiposIds[1]->equipo_id, $e2g ,0);
    	}else{
    		$this->updatePartido($partidoId,$equiposIds[0]->equipo_id, $e1g ,0);
	    	$this->updatePartido($partidoId,$equiposIds[1]->equipo_id, $e2g ,1);
    	}
    }
    public function updatePartido($partidoId,$equipoId, $goles , $ganador)
    {
    	DB::table('equipo_partido')
    		->where([
    			['partido_id','=',$partidoId],
    			['equipo_id','=',$equipoId],
    		])
    		->update(
    			[
    				'goles' => $goles ,
    				'ganador' => $ganador
    			]
    		);
    }
}
