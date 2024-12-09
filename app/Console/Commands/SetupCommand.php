<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artisan:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the application by running initial configurations and migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting setup process...');

        // Example: Run migrations
        $this->call('migrate');

        // Example: Run seeder
        $this->call('db:seed');

        // Example: Clear cache
        $this->call('cache:clear');

        $this->info('Setup process completed successfully!');
    }
}
