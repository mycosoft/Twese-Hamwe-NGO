<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Programs
            'view programs',
            'create programs',
            'edit programs',
            'delete programs',
            // Projects
            'view projects',
            'create projects',
            'edit projects',
            'delete projects',
            // Events
            'view events',
            'create events',
            'edit events',
            'delete events',
            // Team Members
            'view team members',
            'create team members',
            'edit team members',
            'delete team members',
            // Sponsor Children
            'view sponsor children',
            'create sponsor children',
            'edit sponsor children',
            'delete sponsor children',
            // Blog
            'view blog posts',
            'create blog posts',
            'edit blog posts',
            'delete blog posts',
            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'delete blog categories',
            // Donations
            'view donations',
            'manage donations',
            // Gallery
            'view gallery',
            'create gallery',
            'edit gallery',
            'delete gallery',
            // Settings
            'manage settings',
            // Users
            'view users',
            'create users',
            'edit users',
            'delete users',
            // Roles
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $editorRole->givePermissionTo([
            'view programs', 'create programs', 'edit programs',
            'view projects', 'create projects', 'edit projects',
            'view events', 'create events', 'edit events',
            'view team members', 'create team members', 'edit team members',
            'view sponsor children', 'create sponsor children', 'edit sponsor children',
            'view blog posts', 'create blog posts', 'edit blog posts',
            'view blog categories', 'create blog categories', 'edit blog categories',
            'view gallery', 'create gallery', 'edit gallery',
        ]);

        $viewerRole = Role::firstOrCreate(['name' => 'viewer']);
        $viewerRole->givePermissionTo([
            'view programs',
            'view projects',
            'view events',
            'view team members',
            'view sponsor children',
            'view blog posts',
            'view blog categories',
            'view donations',
            'view gallery',
        ]);
    }
}
