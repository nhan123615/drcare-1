<?php

namespace Database\Factories\user;

/* use App\Models\User; */
use App\Models\user\occupation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OccupationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = occupation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->unique()->randomElement(['NEUROLOGIST','OPHTHALMOLOGIST','DENTIST','PEDIATRICIAN']),
        ];
    }
}
