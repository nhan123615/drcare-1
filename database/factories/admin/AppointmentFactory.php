<?php

namespace Database\Factories\admin;

/* use App\Models\User; */
use App\Models\admin\appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,           
            'phone' => $this->faker->phoneNumber,
            'date' => $this->faker->date,
            'time' => $this->faker->time,
            'message' => $this->faker->text($maxNbChars = 20),
            'doctor_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
