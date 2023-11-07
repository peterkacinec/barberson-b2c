<?php

namespace Database\Factories;

use App\Models\CustomerUser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'id' => $this->faker->id(),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'birthdate' => $this->faker->date('Y-m-d'),
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['M', 'F']),
            'photo' => $this->faker->imageUrl,
            'user_id' => CustomerUser::factory(),
        ];
    }
}
