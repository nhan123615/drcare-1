<?php

namespace Database\Factories;

use App\Models\Research;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ResearchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Research::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'thumbnail' => Storage::url('public/research/' . random_int(1, 30) . '.png'),
            'video' => Storage::url('public/videos/' . random_int(1, 2) . '.mp4'),
            'title' => ucwords($this->faker->words(6, true)),
            'subtitle' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nib.',
            'author' => $this->faker->lastName,
            'content' => $this->faker->paragraphs(20,$asText = true),
            'published_at' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'status'=>$this->faker->numberBetween(1,4),
        ];
    }
}
