<?php

namespace App\Repositories;

use App\Domain\Models\User;

class UserRepositoryImpl implements UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser(array $data) : User
    {
        return $this->model->create($data);
    }

    public function updateUser(User $user, array $data)
    {
        return $this->model->update($data);
    }
//
//    public function deleteUser(User $user)
//    {
//        // TODO: Implement deleteUser() method.
//    }
//
    public function findUserById(int $id): User
    {
       return $this->model->find($id);
    }
//
//    public function findUserByEmail(string $email): User
//    {
//        // TODO: Implement findUserByEmail() method.
//    }
//
//    public function findUserByCpf(string $cpf): User
//    {
//        // TODO: Implement findUserByCpf() method.
//    }
//
//    public function getUsers(UserFilter $filter): array
//    {
//        // TODO: Implement getUsers() method.
//    }
}
