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

        // Crear permisos
        Permission::create(['name' => 'manage offers']);
        Permission::create(['name' => 'apply for jobs']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo('manage offers');
        $userRole->givePermissionTo('apply for jobs');

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
        $user->assignRole('user');

        // Crear usuarios con la fábrica y asignarles el rol de usuario
        User::factory(5)->create()->each(function ($user) use ($userRole) {
            $user->assignRole('user');
        });

        // Crear ofertas de empleo con la fábrica
        Offer::factory(5)->create(['user_id' => $admin->id]);

        // Crear aplicaciones con la fábrica
        Application::factory(10)->create();

    }
}
