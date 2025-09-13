<?php

namespace Rdeni\Lux\Database\Seeders\Data;

use Illuminate\Database\Seeder;
use InvalidArgumentException;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeedPostPermission extends Seeder
{
    /**
     * @return void
     */
    public function run() : void
    {
        // Create permission for posts
        Permission::create([
            'name' => 'create post'
        ]);

        // Update post
        Permission::create([
            'name' => 'update post'
        ]);

        // Remove Post
        Permission::create([
            'name' => 'delete post'
        ]);

        // By Default only admin can
        // handle posts
        $adminRole = Role::findByName('admin');

        if(! $adminRole) {
            throw new RoleDoesNotExist("Admin role not exists. Create role first");
        }

        // Assign permission
        $adminRole->givePermissionTo([
            'create post',
            'update post',
            'delete post'
        ]);
    }
}