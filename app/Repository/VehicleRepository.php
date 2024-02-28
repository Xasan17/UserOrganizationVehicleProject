<?php

namespace App\Repository;

use App\Contracts\IUserRepository;
use App\Contracts\IVehicleRepository;
use App\DTO\UserDTO;
use App\Models\User;
use App\Models\Vehicle;

class VehicleRepository implements IVehicleRepository
{
    public function getVehicleById(int $vehicleId):?Vehicle
    {

    /** @var Vehicle|null $vehicle */
$vehicle= Vehicle::query()->find($vehicleId);
return $vehicle;
    }
//    public function createUser(UserDTO $userDTO):User{
//        $user=new User();
//        $user->name=$userDTO->getName();
//        $user->surname=$userDTO->getSurname();
//        $user->age=$userDTO->getAge();
//        $user->birthday=$userDTO->getBirthday();
//        $user->email=$userDTO->getEmail();
//        $user->save();
//        return $user;
//    }
//public function getUserByEmail(string $email): ?User
//{/** @var User|null $user */
//    $user=User::query()->where('email',$email)->first();
//    return $user;
//}
//public function updateUser(int $userId, UserDTO $userDTO):User{
//    $user= $this->getUserById($userId);
//    $user->name=$userDTO->getName();
//    $user->surname=$userDTO->getSurname();
//    $user->age=$userDTO->getAge();
//    $user->birthday=$userDTO->getBirthday();
//    $user->email=$userDTO->getEmail();
//    $user->save();
//    return $user;
//    }
}
