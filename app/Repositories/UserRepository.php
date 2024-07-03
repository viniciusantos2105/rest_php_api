<?php

namespace App\Repositories;

use App\Domain\Models\User;

interface UserRepository
{
    public function createUser(array $data) : User ;
    public function updateUser(User $user, array $data);
//    public function deleteUser(User $user);
    public function findUserById(int $id): User;
//    public function findUserByEmail(string $email): User;
//    public function findUserByCpf(string $cpf): User;

}
