<?php

namespace App\Main\Console\Commands;

use Illuminate\Console\Command;
use App\Main\Services\ModuleService\Service;

class CreateModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:module {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para criação de modulos no sistema';

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
     * @return int
     */
    public function handle(Service $moduleService)
    {
        $moduleService->create($this->argument('module'),false);
    }
}
