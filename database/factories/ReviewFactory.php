<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "BookID" => DB::table("books")->inRandomOrder()->first()->bookID,
            "userID" => DB::table("users")->inRandomOrder()->first()->id,
            "rating" => fake()->numberBetween(1,5),
            "revewText" => fake()->paragraph(),
            "ReviewedDate" => fake()->date(),
        ];
    }
}
