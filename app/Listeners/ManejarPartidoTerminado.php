<?php

namespace App\Listeners;

use App\Events\PartidoTerminado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        $status = $partido->terminado;
        $fase = $partido->partido->fase + 1; 
        $equipos = $partido->equipos;
        App\Partido
        if ($fase < 1) {
           assignarSiguientePartido();

        }
    }
}
