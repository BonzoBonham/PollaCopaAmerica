<?php

namespace App\Listeners;

use App\Events\FinalDeLaFaseDeGrupos;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Partido;
use App\Equipo;


class ManejarFinalDeLaFaseDeGrupos
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
     * @param  FinalDeLaFaseDeGrupos  $event
     * @return void
     */
    public function handle(FinalDeLaFaseDeGrupos $event)
    {
        
                $mejor3 = $this->generarMejorTercero();
                $this->asignarCuartos(3, $mejor3[0]['id']);
                $this->asignarCuartos( 4, $mejor3[1]['id']);
    }

     public function asignarCuartos($pos, $equipoId)
    {
        switch ($pos) {
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

     public function generarPartido($partidoId,$equipoId)
    { 
      $partido = Partido::findOrFail($partidoId);
      $partido->equipos()->attach($equipoId);
      info('new match created sucessfully');
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
    public function generarMejorTercero()
    {
       $tablaTerceros = array();
       $tablaA = $this->generarTablaGrupo(Equipo::grupo('A'));
       $tablaB = $this->generarTablaGrupo(Equipo::grupo('B'));
       $tablaC = $this->generarTablaGrupo(Equipo::grupo('C'));

       array_push($tablaTerceros,$tablaA[2]);
       array_push($tablaTerceros,$tablaB[2]);
       array_push($tablaTerceros,$tablaC[2]);

       usort($tablaTerceros, function ($a, $b) { 
            $w1 = $a['pts']+0.01*$a['udif']; 
            $w2 = $b['pts']+0.01*$b['udif']; 
            return -($w1 - $w2);
        }); 
       
       return $tablaTerceros;
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
