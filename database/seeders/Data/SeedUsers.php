<?php

namespace Rdeni\Lux\Database\Seeders\Data;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Rdeni\Lux\Models\User;
use Throwable;

class SeedUsers extends Seeder
{
    /**
     * @return void
     */
    public function run() : void
    {
        try {
            // Create test administrator from configuration
            // file
            $adminPayload = config('lux.test_admin');

            // Create Admin
            $admin = User::firstOrCreate([
                'email' => $adminPayload['email']
            ], [
                'name' => $adminPayload['name'],
                'password' => $adminPayload['password']
            ]);

            // Assign roles to admin
            $admin->assignRole(['admin', 'user']);
        }
        catch(Throwable $e) {
            // Write log
            Log::error("Initial admin is not created!", [
                'error' => $e::class,
                'message' => $e->getMessage()
            ]);
        }
    }
}