<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), 
            'description' => $this->faker->paragraph, 
            'price' => $this->faker->numberBetween(100, 500), // Random price between 100 and 500
            'type_of_tour' => json_encode($this->faker->randomElements(['Adventure', 'Nature', 'Cultural', 'Historical'], 2)), // Random 2 types
            'duration' => $this->faker->numberBetween(1, 8), 
            'max_participants' => $this->faker->numberBetween(5, 20), 
            'active' => $this->faker->boolean(90), // 90% chance of being active
            'image_path' => 'assets/img/Guided tours/' . $this->faker->word . '.jpg', 
            'included' => implode(', ', $this->faker->words(5)),
            'date' => $this->faker->dateTimeBetween('now', '+1 year'), // Random date within the next year
            'user_id' => \App\Models\User::factory(), // Associate with a user
            'created_at' => now(),
            'updated_at' => now(),
        ];
       
    }
}
