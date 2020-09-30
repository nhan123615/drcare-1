<?php

namespace Database\Factories\user;

/* use App\Models\User; */
use App\Models\user\doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name,
            'description' => $this->faker->text($maxNbChars = 20),
            'occupation_id' => $this->faker->numberBetween(1,4),
        ];
    }
}
