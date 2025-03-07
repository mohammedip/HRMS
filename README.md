# Laravel Application Routes

This application uses Laravel routing to manage different sections, including authentication, leave management, employer management, and more.

## Routes

### Public Routes
- `/` - Welcome page.
- `/dashboard` - Dashboard (Requires authentication and email verification).
- `/profile` - User profile page (Requires authentication).

### Protected Routes (Requires Authentication)
These routes are available only to authenticated users.

#### Leave Management
- `GET leave/pendingLeave` - View pending leave requests.
- `GET leave/{leave}/approve` - Approve a leave request.
- `GET leave/{leave}/reject` - Reject a leave request.

#### Employer Management
- `GET leave/{employer}/extractExtraTime` - Extract extra work time for an employer.
- `POST employer/restoreAll` - Restore all employers.
- `POST department/restoreAll` - Restore all departments.
- `POST formations/restoreAll` - Restore all formations.
- `GET department/restore/one/{id}` - Restore a single department.

#### Resource Controllers
- `department` - CRUD operations for departments.
- `leave` - CRUD operations for leave requests.
- `dashboard` - CRUD operations for dashboard.
- `employer` - CRUD operations for employers.
- `formation` - CRUD operations for formations.
- `emploi` - CRUD operations for job postings.
- `organigramme` - CRUD operations for organigramme.
- `employerFormation` - CRUD operations for employer formations.
- `DELETE employerFormation/{employerId}/{formationId}` - Remove an employer from a formation.

### Authentication Routes
Authentication routes are managed via Laravel's authentication system.

```php
require __DIR__.'/auth.php';
```

## Middleware
- `auth` - Ensures only authenticated users can access certain routes.
- `verified` - Requires email verification for dashboard access.

This configuration ensures a structured and secure application flow, handling authentication and authorization efficiently.

## Database Seeder: RolePermissionSeeder

This seeder sets up roles and permissions using Spatie's Laravel Permission package.

### Seeder Code

```php
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
            'Admin' => ['Admin permission'],
            'HR' => ['HR permission'],
            'Manager' => ['Manager permission'],
            'Employe' => ['Employe permission'],
        ];

        foreach ($roles_permissions as $role => $perms) {
            $roleInstance = Role::firstOrCreate(['name' => $role]);
            $roleInstance->syncPermissions($perms);
        }
    }
}
```

### How to Run the Seeder
To seed the database, run the following command:
```sh
php artisan db:seed --class=RolePermissionSeeder
```

This will create the necessary roles and permissions in the database.

