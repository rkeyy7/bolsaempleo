<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Crear roles
                $adminRole = Role::create(['name' => 'admin']);
                $userRole = Role::create(['name' => 'user']);
                $employerRole = Role::create(['name' => 'employer']); // Nuevo rol
        
                // Crear permisos
                Permission::create(['name' => 'admin function']); // Permiso para empleadores
                Permission::create(['name' => 'apply for jobs']);
                Permission::create(['name' => 'manage myoffers']);
        
                // Asignar permisos a roles
                $adminRole->givePermissionTo('admin function');
                $userRole->givePermissionTo('apply for jobs');
                $employerRole->givePermissionTo('manage myoffers'); // Asignar permiso al rol employer
    }
}
