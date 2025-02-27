<?php

namespace Database\Factories;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           
                // 'responsable_id' => Employer::factory(),
                'nom' => fake()->word(), 
                'description' => fake()->sentence(),
                
           
        ];
    }
}
