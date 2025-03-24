<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name'    => $this->faker->words(3, true),
            // Se asume que cada proyecto se asocia a un usuario generado por su factory
            'user_id' => User::factory(),
        ];
    }
}
