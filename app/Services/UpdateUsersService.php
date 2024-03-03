<?php

namespace App\Services;

use App\Contracts\IUserRepository;
use App\DTO\UserDTO;
use App\Exceptions\BusinessExeption;
use App\Models\User;

class UpdateUsersService
{

    public function __construct(private IUserRepository $repository)
{

}
    public function updateUsersService(int $userId, UserDTO $userDTO): User
    {
        $existingUser = User::where('email', $userDTO->getEmail())->where('id', '<>', $userId)->first();

        if ($existingUser) {
            throw new BusinessExeption(__( 'messages.email_already_exists'));
        }

        return $this->repository->updateUser($userId, $userDTO);


    }
}
