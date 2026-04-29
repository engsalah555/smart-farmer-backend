<?php

namespace App\Console\Commands;

use App\Services\PlantIntegrationService;
use Illuminate\Console\Command;

class FetchPlantsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plants:fetch {--page=1 : The page number to fetch}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches plant species from Perenual API, translates to Arabic, and stores in the DB';

    /**
     * Execute the console command.
     */
    public function handle(PlantIntegrationService $service)
    {
        $page = $this->option('page');

        $this->info("Starting plant fetch for page {$page}...");

        $success = $service->fetchAndStorePlants($page);

        if ($success) {
            $this->info('Plants fetched and populated successfully.');
        } else {
            $this->error('Failed to fetch or populate plants. Check laravel logs.');
        }
    }
}
