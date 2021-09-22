<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->name,
            'lastname' => $this->faker->name,
            'mail' => $this->faker->unique()->safeEmail,
            'cellphone' => $this->faker->regexify('\d{10}'),
            'phone' => $this->faker->regexify('\d{10}'),
            'streetNumber' => $this->faker->regexify('\d{1,4}'),
            'zipCode' => $this->faker->regexify('\d{5}'),
            'city' => $this->faker->city(),
            'streetName' => $this->faker->address(),
            'birthdate' => $this->faker->dateTime(),
            'description' => $this->faker->text(),
            'client_type_id' => $this->faker->numberBetween(1, 3),
            'user_id' => 1,
            'sexe' => $this->faker->boolean()
        ];

    }
}