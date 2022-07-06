<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(20),
            'start' =>$this->faker->date('Y-m-d'),
            'end' =>$this->faker->date('Y-m-d'),
            'direction' =>$this->faker->address(),
            'hour' =>$this->faker->time('H:i:s'),
            'color' => $this->faker->hexcolor(),
        ];
    }
}
