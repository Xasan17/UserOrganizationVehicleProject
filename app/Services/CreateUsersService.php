<?php

namespace App\Services;

use App\Contracts\IUserRepository;
use App\DTO\UserDTO;
use App\Exceptions\BusinessExeption;
use App\Repository\UserRepository;

class CreateUsersService
{

public function __construct(private IUserRepository $repository)
{

}
public function execute(UserDTO $userDTO): \App\Models\User
{
$userWithEmail=$this->repository->getUserByEmail($userDTO->getEmail());
if ($userWithEmail!==null){
    throw new BusinessExeption(__( 'messages.email_already_exists'));
}
return $this->repository->createUser($userDTO);
}




}
