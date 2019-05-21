<?php

namespace App\Listeners;

use App\Events\PartidoTerminado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Partidos;

class manejarPartidoTerminado
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PartidoTerminado  $event
     * @return void
     */
    public function handle(PartidoTerminado $event)
    {
        $partido = $event->partido;
        $terminado = $partido->terminado;
        $fase = $partido->partido->fase; 
        if($terminado){
            if ($fase>1) {
                $this->partidoFaseDeEliminatoria();
            } else {
                $this->partidoFaseDeGrupo();
            }
        }
        return false;
    }
    public function partidoFaseDeEliminatoria($partidoId, $fase)
    {
        $partido= App\Partido::find($partidoId);
        $equiposIds = $partido->equipos->pluck('id');
        $pivotArray = array();
        foreach($partido->equipos as $equipo){
            $pivotArray[$equipo->id] = $equipo->pivot->ganador;
        }
        if ($pivotArray[$equiposIds[0]] == 1) {
            $ganador = $equiposIds[0];
            $perdedor = $equiposIds[1];
        } else {
           $ganador = $equiposIds[1];
           $perdedor = $equiposIds[0];
        }
        
        switch ($fase) {
            case 2:
                $nextMatch = ($partidoId == 18 ||$partidoId == 19 ) ? 23:24;
                $this->generarPartido($nextMatch, $ganador);
                break;
            case 3:
                $this->generarPartido(26,$ganador);
                $this->generarPartido(26,$perdedor);
                break;
             case 5:
                # generar evento de ganador de torneo

                break;
            default:
                # code...
                break;
        }
    }
    public function partidoFaseDeGrupos($partidoId)
    {
        $grupo = App\Partido::find($partidoId)->equipos->first()->grupo;
        $equipos = App\Equipos::grupo($grupo);
        
        $aDone = $this->verificarFaseDeGruposTerminada('A');
        $bDone = $this->verificarFaseDeGruposTerminada('B');
        $cDone = $this->verificarFaseDeGruposTerminada('C');
        $myGroupDone = $this->verificarFaseDeGruposTerminada($grupo);
        if($myGroupDone){
                #determinar quien quedo en la primera posicion 

            if($aDone && $bDone && $cDone){

            }
        }




    }
    public function verificarFaseDeGruposTerminada($grupo)
    {
        $equipos = App\Equipos::grupo($grupo);
        $terminado = true;
        foreach ($equipos as $equipo) {
           foreach ($equipo->partidos as $partido) {
               $terminado &= $partido->terminado;
           }
        }
        return $terminado;
    }
    public function asignarCuartos()
    {
        switch ($grupo) {
            case 'A':
                # code...
                break;
            case 'B':
                # code...
                break;
            case 'C':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }

    public function generarPartido($partidoId,$equipoId)
    {
       DB::table('equipo_partido')->insert(
                [
                    'partido_id' => $partidoId,
                    'equipo_id' => $equipoId
                ]
            );
    }

}












































