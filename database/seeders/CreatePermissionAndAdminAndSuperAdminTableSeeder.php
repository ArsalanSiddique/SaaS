<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatePermissionAndAdminAndSuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'tenant-list',
            'tenant-create',
            'tenant-edit',
            'tenant-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'super-admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        
        $adminRole = Role::create(['name' => 'admin']);
        $adminPermissions = Permission::whereNotIn('name', [
            'tenant-list',
            'tenant-create',
            'tenant-edit',
            'tenant-delete'
        ])->pluck('id')->all();
        $adminRole->syncPermissions($adminPermissions);
    }
}
