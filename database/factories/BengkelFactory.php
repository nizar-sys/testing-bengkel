<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bengkel>
 */
class BengkelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'title' => $this->faker->sentence(3),
            'address' => $this->faker->address,
            'description' => $this->faker->paragraph(3),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'jambuka' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'jamtutup' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
