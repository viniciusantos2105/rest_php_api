<?php

namespace App\Repositories;

use App\Domain\Models\User;

interface UserRepository
{
    public function createUser(array $data) : User ;
    public function updateUser(int $userId, array $data);
    public function deleteUserById(int $userId);
    public function findUserById(int $id): User;
//    public function findUserByEmail(string $email): User;
//    public function findUserByCpf(string $cpf): User;

}
