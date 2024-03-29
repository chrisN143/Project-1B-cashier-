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
            'permission-create',
            'permission-edit|update',
            'permission-delete',
            'role-list',
            'role-create',
            'role-edit|update',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit|update',
            'user-delete',
            'dashboard-view',
            'master-data-view',
            'product-list',
            'product-create',
            'product-edit|update',
            'product-delete',
            'store-list',
            'store-create',
            'store-edit|update',
            'store-delete',
            'transaction-create',
            'transaction-edit|update',
            'transaction-delete',
            'transaction-list',
            'userManegement-list',
            'menuView-list',
            'laporan-list',
            'laporan-stokReport-list',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        /* Create Role */
        /* Admin */
        $superadmin = Role::create(['name' => 'Superadmin']);
        $getPermissions = Permission::pluck('id', 'id')->all();
        $superadmin->syncPermissions($getPermissions);
        $admin = Role::create(['name' => 'Admin']);
        $getAdminPermissions = Permission::pluck('id', 'id')->all();
        $admin->syncPermissions($getAdminPermissions);

        /* User */
        $user = Role::create(['name' => 'User']);
        $user->syncPermissions(['menuView-list']);
        $tukang = Role::create(['name' => 'tukang']);
        $tukang->syncPermissions(['master-data-view','product-list','store-list','transaction-list']);

    }
}
