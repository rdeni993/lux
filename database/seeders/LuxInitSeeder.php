<?php

namespace Rdeni\Lux\Database\Seeders;

use Illuminate\Database\Seeder;
use Rdeni\Lux\Database\Seeders\Data\SeedRoles;
use Rdeni\Lux\Database\Seeders\Data\SeedUsers;

class LuxInitSeeder extends Seeder
{
    /**
     * @var array
     */
    protected array $seeders = [
        SeedRoles::class, // Seed roles
        SeedUsers::class, // Seed users
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