<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Create Permission */
        $permissions = [
            'permission-list',
            'permission-create|store',
            'permission-edit|update',
            'permission-delete',
            'role-list',
            'role-create|store',
            'role-edit|update',
            'role-delete',
            'user-list',
            'user-create|store',
            'user-edit|update',
            'user-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        /* Create Role */
        /* Admin */
        $admin = Role::create(['name' => 'Admin']);
        $getPermissions = Permission::pluck('id', 'id')->all();
        $admin->syncPermissions($getPermissions);

        /* User */
        Role::create(['name' => 'User']);
    }
}
