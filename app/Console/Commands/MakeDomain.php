<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeDomain extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:domain {name : The name of the domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new domain model, domain repository, and domain service';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->createModel();
        $this->createRepository();
        $this->createService();
    }

    /**
     * Create a model for the domain.
     *
     * @return void
     */
    protected function createModel()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:model', [
            'name' => $name,
        ]);
    }

    /**
     * Create a repository for the domain.
     *
     * @return void
     */
    protected function createRepository()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:domain-repository', [
            'name' => $name,
        ]);
    }

    /**
     * Create a service for the domain.
     *
     * @return void
     */
    protected function createService()
    {
        $name = Str::studly($this->argument('name'));

        $this->call('make:domain-service', [
            'name' => $name,
        ]);
    }
}
