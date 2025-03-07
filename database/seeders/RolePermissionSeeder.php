<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Admin permission',

            'HR permission',

            'Manager permission',

            'Employe permission',

           
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $roles_permissions = [
            'Admin' => [
                'Admin permission',
               
            ],
            'HR' => [
                'HR permission',
                
            ],
            'Manager' => [
                'Manager permission',
             
            ],
            'Employe' => [
                'Employe permission',
              
            ],
        ];

        foreach ($roles_permissions as $role => $perms) {
            $roleInstance = Role::firstOrCreate(['name' => $role]);
            $roleInstance->syncPermissions($perms);
        }
    }
}
