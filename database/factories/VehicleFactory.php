<?php

namespace Database\Factories;

use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'type'=>$this->faker->randomElement(['Sedan', 'Wagon','Suv','Hatchback','Cabriolet','Supercar',
                'Pickup', '4WD','Mini Truck','Van', 'Camper van','Truck','limousine']),
            'company'=> $this->faker->randomElement(['Audi','BMW','Leksus','Lada','Reno','Mercedes',
                'Ferrari','Lamborghini','Chevrolet','Man', 'ISUZU','UAZ','Jaguar','Ford','Toyota','Nissan','Mitsubishi']),
              'organization_id' => Organization:: all()->random()->id
        ];
    }
}
