<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Resources\UserResource;
use App\Models\FuelSensor;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
           UserSeeder::class,]);
        $this->call([
            OrganizationSeeder::class,
        ]);
        $this->call([
            VehicleSeeder::class,
        ]);
        $this->call([
            FuelSensorSeeder::class,
        ]);
        $this->call([
            OrganizationUserSeeder::class,]);
    }
}
