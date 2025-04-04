<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Offer;
use App\Models\Application;
use App\Models\File; // Ensure the File model exists in this namespace


class UserSeeder extends Seeder
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
        Permission::create(['name' => 'manage offers']);
        Permission::create(['name' => 'apply for jobs']);
        Permission::create(['name' => 'view applications']); // Permiso para empleadores

        // Asignar permisos a roles
        $adminRole->givePermissionTo('manage offers');
        $userRole->givePermissionTo('apply for jobs');
        $employerRole->givePermissionTo('view applications'); // Asignar permiso al rol employer

        // Crear usuarios de prueba manualmente
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Test User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);

        File::create([
            'user_id' => $user->id,
            'file_path' => 'resumes/test.pdf', 
            'file_type' => 'application/pdf',
        ]);

        $user->assignRole('user');

        // Crear un usuario manualmente con el rol de employer
        $employer = User::create([
            'name' => 'Employer User',
            'email' => 'employer@example.com',
            'password' => Hash::make('password'),
        ]);
        $employer->assignRole('employer'); // Asignar el rol de employer

        // Crear usuarios con la fábrica y asignarles el rol de usuario
        User::factory(5)->create()->each(function ($user) use ($userRole) {
            $user->assignRole('user');
        });
        User::factory(5)->create()->each(function ($user) use ($userRole) {
            $user->assignRole('employer');
        });

        // Crear ofertas de empleo con la fábrica
        Offer::factory(5)->create(['user_id' => $admin->id]);

        // Crear aplicaciones con la fábrica
        Application::factory(10)->create();

    }
}
