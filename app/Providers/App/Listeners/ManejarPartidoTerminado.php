<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\PartidoTerminado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ManejarPartidoTerminado
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
        //
    }
}
