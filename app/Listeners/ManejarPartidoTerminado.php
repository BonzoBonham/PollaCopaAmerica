<?php

namespace App\Listeners;

use App\Events\PartidoTerminado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;

use App\Partido;
use App\Equipo;


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
        $fase = $partido->fase;
        if($terminado){
            if ($fase>1) {
                $this->partidoFaseDeEliminatoria($partido->id, $fase);
            } else {
                $this->partidoFaseDeGrupos($partido->id);
            }
        }
        return false;
    }
    public function partidoFaseDeEliminatoria($partidoId, $fase)
    {
        $partido= Partido::find($partidoId);
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
                  $nextMatch = ($partidoId == 19 || $partidoId == 20 ) ? 23:24;
                  $partido = Partido::findOrFail($nextMatch);
                  $exists =  $partido->equipos()->where('id',$partidoId)->exists();
                  if(!$exists){
                  $this->generarPartido($nextMatch, $ganador);
                }
                break;
            case 3:
                $this->generarPartido(26,$ganador);
                $this->generarPartido(25,$perdedor);
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
        $grupo = Partido::find($partidoId)->equipos->first()->grupo;
        $equipos = Equipo::grupo($grupo);
        $myGroupDone = $this->verificarFaseDeGruposTerminada($grupo);

        if($myGroupDone){
            #determinar quien quedo en la prime-ra posicion 
            $tabla = $this->generarTablaGrupo($equipos);
            $this->asignarCuartos($grupo, 1, $tabla[0]['id']);
            $this->asignarCuartos($grupo, 2, $tabla[1]['id']);
        }
    }
    
    public function generarMejorTercero()
    {
       $tablaTerceros = array();
       $tablaA = $this->generarTablaGrupo(Equipo::grupo('A'));
       $tablaB = $this->generarTablaGrupo(Equipo::grupo('B'));
       $tablaC = $this->generarTablaGrupo(Equipo::grupo('C'));
       array_push($tablaTerceros,$tablaA[2]);
       array_push($tablaTerceros,$tablaB[2]);
       array_push($tablaTerceros,$tablaC[2]);
       usort($grupo, function ($a, $b) { 
            $w1 = $a['pts']+0.01*$a['udif']; 
            $w2 = $a['pts']+0.01*$b['udif']; 
            return -($w1 - $w2);
        }); 
       return $tablaTerceros;
    }



    public function verificarFaseDeGruposTerminada($grupo)
    {
        $equipos = Equipo::grupo($grupo);

        $terminado = true;
        foreach ($equipos->get() as $equipo) {
           foreach ($equipo->partidos as $partido) {
               $terminado &= boolval($partido->terminado);
           }
        }
        return $terminado;
    }
    public function asignarCuartos($grupo, $pos, $equipoID)
    {
        switch ($pos) {
            case 1:
                $this->asignarCuartosPorGrupos($grupo,$equipoID,19,21,22);
                break;
            case 2:
                $this->asignarCuartosPorGrupos($grupo,$equipoID,20,20,21);
                break;
            case 3:
                 $this->generarPartido(19,$equipoId);
                break;
            case 4:
                $this->generarPartido(22,$equipoId);
                break;
            default:
                # code...
                break;
        }
    }
    public function asignarCuartosPorGrupos($grupo, $equipoId, $a,$b,$c)
    {
        switch ($grupo) {
            case 'A':
                $this->generarPartido($a,$equipoId);
                break;
            case 'B':
                $this->generarPartido($b,$equipoId);
                break;
            case 'C':
                $this->generarPartido($c,$equipoId);
                break;
            default:
                # code...
                break;
        }
        
    }

    public function generarPartido($partidoId,$equipoId)
    { 
      $partido = Partido::findOrFail($partidoId);
      $exists =  $partido->equipos()->where('id',$partidoId)->exists();
      if(!$exists){
        $partido->equipos()->attach($equipoId);
      }
      
      info('new match created sucessfully');
    }

    public function generarTablaGrupo($equipos)
    {
         $grupo = array();

          foreach ($equipos->get() as $equipo) {
            $win = 0;
            $gf = 0;
            $gc = 0;
            $data = array();

            foreach ($equipo->partidosFaseGrupos as $partido) {
              $gf += $partido->pivot->goles;
              foreach ($partido->equipos->where('id', '!=', $equipo->id) as $rival){
                $gc += $rival->pivot->goles;
              }
            }
            $dif = $gf - $gc;

            $data['id'] = $equipo->id;          
            $data['win'] = $equipo->partidosFaseGruposGanados->count();
            $data['tie'] = $equipo->partidosFaseGruposEmpatados->count();
            $data['pts'] = 3*$data['win'] + $data['tie'];
            $data['udif'] = $gf - $gc;
            array_push($grupo, $data);

          }

          usort($grupo, function ($a, $b) { 
            $w1 = $a['pts']+0.01*$a['udif']; 
            $w2 = $b['pts']+0.01*$b['udif']; 
            return -($w1 - $w2);
          }); 
          return $grupo;

    }

}


 










































