<?php

namespace App\Main\Console\Commands;

use Illuminate\Console\Command;

use App\Main\Services\PackageService\Service;

class CreatePackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:package {package}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para criação de pacotes simplificados.';

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
    public function handle(Service $packageService)
    {
        $packageService->create($this->argument('package'),true);
    }
}
