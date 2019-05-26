<?php

namespace App\Listeners;

use App\Events\GanadorDelTorneo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Equipo;
use App\User;

class ManejarGanadorDelTorneo
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct( Equipo $equipo)
    {

    }

    /**
     * Handle the event.
     *
     * @param  GanadorDelTorneo  $event
     * @return void
     */
    public function handle(GanadorDelTorneo $event)
    {
        $eid = $event->equipo->id;
        $usuarios = User::apuestas($eid)->update(['ganador' => 1]);
        info('hay un ganador');
    }
}
