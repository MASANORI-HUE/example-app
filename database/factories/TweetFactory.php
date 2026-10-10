<?php

namespace Database\Factories;

use Carbon\Carbon;
// use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'content' => $this->faker->realText(100),
            'created_at' => Carbon::now()->yesterday(),
        ];
    }
}
