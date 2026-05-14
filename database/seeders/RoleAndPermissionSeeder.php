<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //Category Permissions
        Permission::create(['name' => 'view categories']);
        Permission::create(['name' => 'create categories']);

        //Post Permissions
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit own posts']);
        Permission::create(['name' => 'delete own posts']);
        Permission::create(['name' => 'manage all posts']); //for admin

        //Tag Permissions
        Permission::create(['name' => 'view tags']);
        Permission::create(['name' => 'create tags']);

        //Profile Permissions
        Permission::create(['name' => 'update profile']);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'view categories', 'create categories',
            'view posts', 'create posts', 'edit own posts', 'delete own posts',
            'view tags', 'create tags',
            'update profile'
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}
