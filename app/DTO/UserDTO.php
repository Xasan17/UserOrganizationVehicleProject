<?php

namespace App\DTO;

class UserDTO
{
public function __construct(
//    private string $id,
private string $name,
private string $surname,
private string $age,
private string $birthday,
private string $email,
)
{

}

//    public function getId(): string
//    {
//        return $this->id;
//    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getAge(): string
    {
        return $this->age;
    }

    public function getBirthday(): string
   {
        return $this->birthday;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
public static function fromArray(array $data):UserDTO
{return new UserDTO(
//    id:$data['id'],
    name: $data['name']??null,
    surname:$data['surname']??null,
    age: $data['age']??null,
    birthday:$data['birthday']??null,
    email: $data['email']??null
);

}
}
