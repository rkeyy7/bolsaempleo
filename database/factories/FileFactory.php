<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Asigna un usuario aleatorio
            'file_path' => 'files/' . $this->faker->uuid() . '.pdf', // Simula un archivo PDF
            'file_type' => 'application/pdf',
        ];
    }
}
