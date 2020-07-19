<?php

namespace App\Main\Console\Commands;

use Illuminate\Console\Command;
use App\Main\Services\RepositoryService\Service;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:repository {repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para criar um repositorio';

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
    public function handle(Service $repositoryService)
    {
         $repositoryService->create($this->argument("repository"));
    }
}
