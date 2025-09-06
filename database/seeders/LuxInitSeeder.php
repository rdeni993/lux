<?php

namespace Rdeni\Lux\Database\Seeders;

use Illuminate\Database\Seeder;
use Rdeni\Lux\Database\Seeders\Data\SeedUsers;

class LuxInitSeeder extends Seeder
{
    /**
     * @var array
     */
    protected array $seeders = [
        SeedUsers::class, // Seed Users
    ];

    /**
     * @return void
     */
    public function run() : void {
        foreach($this->seeders as $seeder) {
            $this->call($seeder);
        }
    }
}