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
    protected $signature = 'module:create {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if($moduleService->create($this->argument('module'))){
            echo "Modulo criado com sucesso.";
        }else{
            echo "Falha ao criar modulo.";
        }
    }
}
