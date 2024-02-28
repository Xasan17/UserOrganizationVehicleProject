<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrganizationUser>
 */
class OrganizationUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
//        $organizationid = Organization::pluck('id')->toArray();
//        $userid = User::pluck('id')->toArray();

        return[
//            'user_id' => User::all()->unique->random()->id,
//            'organization_id' => Organization::all()->unique->random()->id
           // User::factory()->has(Organization::factory()->count(5))->count(10)->create()
//            'organization_id' => $this->faker->unique()->numberBetween(1,500),
//            'user_id' => $this->faker->unique()->numberBetween(1,500),
            ];
    }
//    {$user_id=User::all()->random()->id;
//        $organization_id=Organization::all()->random()->id;
//        return [
//            'user_id'=>$user_id,
//            'organization_id' =>$organization_id
//
//        ];



//    public function configure()
//    {return $this->afterCreating(function (OrganizationUser $organizationUser){
//        $organizationUser->unique(['user_id','organization_id']);
//    });
//
//    }

}
