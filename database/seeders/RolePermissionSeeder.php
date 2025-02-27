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
            // Permissions générales
            'view dashboard',
            
            // Gestion des utilisateurs et entreprises
            'create entreprise',
            'edit entreprise',
            'delete entreprise',
            'view entreprise',

            // Gestion des employés
            'create employee',
            'edit employee',
            'delete employee',
            'view employee',
            
            // Gestion des départements et hiérarchie
            'create department',
            'edit department',
            'delete department',
            'view department',
            
            // Gestion des contrats et suivi de carrière
            'manage contracts',
            'manage salaries',
            'manage promotions',
            'manage trainings',
            
            // Gestion des fichiers et documents
            'upload documents',
            'delete documents',
            'view documents',
            
            // Gestion des notifications
            'send notifications',
        ];

        // Création des permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Création des rôles avec leurs permissions
        $roles_permissions = [
            'Admin' => [
                'view dashboard',
                'create entreprise', 'edit entreprise', 'delete entreprise', 'view entreprise',
                'create employee', 'edit employee', 'delete employee', 'view employee',
                'create department', 'edit department', 'delete department', 'view department',
                'manage contracts', 'manage salaries', 'manage promotions', 'manage trainings',
                'upload documents', 'delete documents', 'view documents',
                'send notifications',
            ],
            'HR' => [
                'view dashboard',
                'create employee', 'edit employee', 'delete employee', 'view employee',
                'manage contracts', 'manage salaries', 'manage promotions', 'manage trainings',
                'upload documents', 'delete documents', 'view documents',
                'send notifications',
            ],
            'Manager' => [
                'view dashboard',
                'create employee', 'edit employee', 'view employee',
                'create department', 'edit department', 'view department',
                'upload documents', 'view documents',
                'send notifications',
            ],
            'Employe' => [
                'view dashboard',
                'view employee',
                'view department',
                'upload documents', 'view documents',
            ],
        ];

        foreach ($roles_permissions as $role => $perms) {
            $roleInstance = Role::firstOrCreate(['name' => $role]);
            $roleInstance->syncPermissions($perms);
        }
    }
}
