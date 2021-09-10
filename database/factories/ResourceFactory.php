<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

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
            'description' => $this->faker->sentences(rand(3, 7), true),
            'url' => $this->faker->url,
            'type' => $this->faker->numberBetween(1,5),
        ];
    }
}
