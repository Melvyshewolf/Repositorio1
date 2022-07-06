<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(20),
            'description' =>$this->faker->text($maxNbChars = 200),
            //'latitude' =>$this->faker->ipv4 (),
            //'longitude' => $this->faker->localIpv4 (),
            'status' => $this->faker->randomElement([1,2]),
            'user_id' => User::all()->random()->id,
            'event_id' => Event::all()->random()->id,
        ];
    }
}
