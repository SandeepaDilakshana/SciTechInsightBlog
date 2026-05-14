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
        Permission::create(['name' => 'manage categories']);

        //Post Permissions
        Permission::create(['name' => 'edit own posts']);
        Permission::create(['name' => 'delete own posts']);
        Permission::create(['name' => 'manage all posts']); //for admin

        //Tag Permissions
        Permission::create(['name' => 'manage tags']);

        //Profile Permissions
        Permission::create(['name' => 'update profile']);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'edit own posts', 'delete own posts',
            'update profile'
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
    }
}
