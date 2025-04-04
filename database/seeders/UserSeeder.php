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

        $employer = User::create([
            'name' => 'Employer User',
            'email' => 'employer@example.com',
            'password' => Hash::make('password'),
        ]);
        $employer->assignRole('employer');
        
        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('user');
        });
        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('employer');
        });

        Offer::factory(5)->create(['user_id' => $admin->id]);

        Application::factory(10)->create();
    }
}
