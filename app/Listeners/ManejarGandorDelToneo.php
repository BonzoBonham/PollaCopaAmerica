<?php

namespace App\Listeners;

use App\Events\GandorDelToneo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ManejarGandorDelToneo
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
     * @param  GandorDelToneo  $event
     * @return void
     */
    public function handle(GandorDelToneo $event)
    {
        //
    }
}
