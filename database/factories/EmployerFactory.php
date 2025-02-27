<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employer;
use App\Models\Department;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'date_naissance' => $this->faker->date(),
            'adresse' => $this->faker->address(),
            'date_recrutement' => $this->faker->date(),
            'type_contrat' => $this->faker->randomElement(['CDI', 'CDD', 'Freelance']),
            'salaire' => $this->faker->randomFloat(2, 1000, 5000),
            'statut' => $this->faker->randomElement(['actif', 'inactif']),
            'department_id' => Department::factory(),
            'role_id' => Role::inRandomOrder()->first()->id,
        ];
    }
}
