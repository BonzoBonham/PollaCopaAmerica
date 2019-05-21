<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunJornadas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jornada:run {num}';

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
         $jornadaId = $this->argument('num');
         switch ($jornadaId) {
             case 0:
                $this->info('migrando y populando las tablas...');
                $this->call('migrate:refresh');
                $this->call('db:seed', [
                     '--class' => 'DatabaseSeeder'
                ]);
                 break;
            case 1:
                $this->info('corriendo la 1era jornada...');
                $this->call('db:seed', [
                     '--class' => 'JornadaUnoTableSeeder'
                ]);
                 break;
            case 2:
                $this->info('corriendo la 2nda jornada...');
                $this->call('db:seed', [
                     '--class' => 'JornadaDosTableSeeder'
                ]);
                 break;

            case 3:
                $this->info('corriendo la jornada de cuartos de final...');
                $this->call('db:seed', [
                    '--class' => 'CuartosTableSeeder'
                ]);
                 break;
            case 4:
                 $this->info('corriendo la jornadade semifinales...');
                 $this->call('db:seed', [
                     '--class' => 'SemisTableSeeder '
                ]);
                 break;
             case 5:
                $this->info('corriendo la jornada de la final...');
                $this->call('db:seed', [
                     '--class' => 'FinalTableSeeder'
                ]);
                 break;
             default:
                 # code...
                 break;
         }
    }
}
