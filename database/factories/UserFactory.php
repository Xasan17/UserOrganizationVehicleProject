<?php

namespace Database\Factories;

use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
protected $model=User:: class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'surname'=>$this->faker->lastName,
            'age'=> $this->faker->numberBetween(0,100),
            'email' => fake()->unique()->safeEmail(),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
            'birthday'=>Carbon::create($this->faker->numberBetween(1955,2015),
  $this->faker->numberBetween(1,12),
                $this->faker->numberBetween(1,28)),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
