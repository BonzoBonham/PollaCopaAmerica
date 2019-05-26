<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\FinalDeLaFaseDeGrupos;

class RunJornadas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jornada:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'corre un seeder para popular las tablas deacuerdo con las jornadas.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         if ($this->confirm('Deseas migrar y popular las tablas ...? ')) {
            $this->info('migrando y populando las tablas...');
            $this->call('migrate:refresh');
            $this->call('db:seed', [
                '--class' => 'DatabaseSeeder'
            ]);
         }

         if ($this->confirm('Deseas correr la 1era Jornada ...? ')) {
            $this->info('corriendo la 1era jornada...');
                $this->call('db:seed', [
                     '--class' => 'JornadaUnoTableSeeder'
                ]);
         }

        if ($this->confirm('Deseas correr la 2nda Jornada ...? ')) {
            $this->info('corriendo la 1era jornada...');
            $this->call('db:seed', [
                '--class' => 'JornadaDosTableSeeder'
            ]);
            event(new FinalDeLaFaseDeGrupos());
         }
        if ($this->confirm('Deseas correr la Jornada de cuartos de final ...? ')) {
            $this->info('corriendo la jornada de cuartos de final...');
            $this->call('db:seed', [
                '--class' => 'CuartosTableSeeder'
            ]);
         }
        if ($this->confirm('Deseas correr la Jornada de semifinales ...? ')) {
            $this->info('corriendo la jornadade semifinales...');
            $this->call('db:seed', [
                '--class' => 'SemisTableSeeder'
            ]);
         }

         if ($this->confirm('Deseas correr la final y el 3er puesto ...? ')) {
            $this->info('corriendo la jornada de la final...');
            $this->call('db:seed', [
                '--class' => 'FinalTableSeeder'
            ]);
         }
    }
}
