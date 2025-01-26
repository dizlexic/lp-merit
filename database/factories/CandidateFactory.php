<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = $this->faker->unique()->firstName;
        $lastName = $this->faker->unique()->lastName;

        return [
            'name' => $firstName . ' ' . $lastName,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'slug' => $this->faker->slug,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
            'elected_position' => $this->faker->jobTitle,
            'election_district' => $this->faker->word,
            'election_cycle' => $this->faker->word,
            'source' => 'factory',
            'note' => $this->faker->paragraph,
            'picture' =>  "https://placehold.in/400x300@2x.png/dark",
            'verified_by' => $this->faker->randomElement([null, User::factory()->create()->id]),
        ];
    }
}
