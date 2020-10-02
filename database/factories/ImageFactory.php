<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_main' => Storage::url('public/images/' . random_int(1, 30) . '.png'),
            'image_front' => Storage::url('public/images/' . random_int(1, 30) . '.png'),
            'image_back' => Storage::url('public/images/' . random_int(1, 30) . '.png'),
            'image_right' => Storage::url('public/images/' . random_int(1, 30) . '.png'),
            'image_left' => Storage::url('public/images/' . random_int(1, 30) . '.png'),
            'product_id'=> $this->faker->unique()->numberBetween(1,30),
        ];
    }
}
