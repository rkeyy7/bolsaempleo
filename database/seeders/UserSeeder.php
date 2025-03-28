<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


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
            'email' => 'carlitos@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $roleAdmin = Role::create(['name' => 'administrator']);
        $adminUser -> assignrole($roleAdmin);
        $roleAdmin->syncPermissions($permissionAdmin);


    }
}
