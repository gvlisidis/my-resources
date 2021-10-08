<?php

namespace Database\Factories;

use App\Models\Snippet;
use Illuminate\Database\Eloquent\Factories\Factory;

class SnippetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Snippet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->words(rand(4, 8), true),
            'body' => $this->faker->sentences(rand(3, 7), true),
        ];
    }
}
