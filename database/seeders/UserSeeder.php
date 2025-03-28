<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissionAdmin = Permission::create(['name' =>'crear usuario']);
        $permissionAdmin = Permission::create(['name' =>'editar usuario']);
        $permissionAdmin = Permission::create(['name' =>'actualizar usuario']);
        $permissionAdmin = Permission::create(['name' =>'borrar usuario']);


        $permissionAdmin = Permission::create(['name' =>'crear OfertaLaboral']);
        $permissionAdmin = Permission::create(['name' =>'editar OfertaLaboral']);
        $permissionAdmin = Permission::create(['name' =>'actualizar OfertaLaboral']);
        $permissionAdmin = Permission::create(['name' =>'borrar OfertaLaboral']);

       $adminUser = User::factory()->create([
            'name' => 'Carlos De la rosa',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
            'password' => bcrypt('12345678')
        ]);

        $roleAdmin = Role::create(['name' => 'administrator']);
        $adminUser -> assignrole($roleAdmin);
        $roleAdmin->syncPermissions($permissionAdmin);

        $desmpleadouser = User::factory()->create([
            'name' => 'Juan Castro',
            'email' => 'test2@example.com',
            'password' => Hash::make('12345678'),
            'password' => bcrypt('12345678')
        ]);

        $roledesempleado = Role::create(['name' => 'desempleado']);
        $desmpleadouser -> assignrole($roledesempleado);
        $roledesempleado->syncPermissions($permissionAdmin);


    }
}
