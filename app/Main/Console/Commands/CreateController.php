<?php

namespace App\Main\Console\Commands;

use Illuminate\Console\Command;
use App\Main\Services\ControllerService\Service as ControllerService;

class CreateController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:controller {namespace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para criação de controllers';

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
    public function handle(ControllerService $controllerService)
    {
        $controllerService->create($this->argument("namespace"));
    }
}
