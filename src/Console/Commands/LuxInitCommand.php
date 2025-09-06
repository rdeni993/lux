<?php

namespace Rdeni\Lux\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Rdeni\Lux\Database\Seeders\LuxInitSeeder;
use Throwable;

class LuxInitCommand extends Command
{
    /**
     * The name of console command
     *
     * @var string
     */
    protected $signature = 'lux:init';

    /**
     * @var string
     */
    protected $description = 'Initialize base data for lux package';

    /**
     * @return Command::SUCCESS | Command::FAILURE
     */
    public function handle()
    {
        try {
            // Call Main seeder
            // Other seeders will be called automaticaly
            Artisan::call("db:seed", [
                '--class' => LuxInitSeeder::class
            ]);

            // Send message to terminal
            $this->info("Lux initialization succeed");

            // Return
            return Command::SUCCESS;
        }
        catch (Throwable $e) {
            // Log Error
            Log::error("Lux package failed to initialize!", [
                'error' => $e::class,
                'message' => $e->getMessage(),
            ]);

            // Show in terminal
            $this->error("Lux package failed to initialize!");

            // Default Failure exception
            return Command::FAILURE;
        }
    }
}