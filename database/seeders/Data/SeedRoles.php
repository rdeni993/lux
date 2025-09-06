<?php

namespace Rdeni\Lux\Database\Seeders\Data;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SeedRoles extends Seeder
{
    /**
     * @return void
     */
    public function run() : void
    {
        // Seed admin role for max
        // privilegies
        Role::firstOrCreate([
            'name' => 'admin'
        ], [
            'guard_name' => 'web'
        ]);

        // Seed user role for all
        // registered users
        Role::firstOrCreate([
            'name' => 'user'
        ], [
            'guard_name' => 'web'
        ]);
    }
}