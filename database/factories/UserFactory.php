<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'username' => $this->faker->name,
            'cellphone' => $this->faker->regexify('\d{10}'),
            'phone' => $this->faker->regexify('\d{10}'),
            'password' => Hash::make('secret'),
            'user_type_id' => $this->faker->numberBetween(1, 4),
            'sexe' => $this->faker->boolean()
        ];

    }
}