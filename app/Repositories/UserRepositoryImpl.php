<?php

namespace App\Repositories;

use App\Domain\Models\User;
use Illuminate\Support\Facades\DB;


class UserRepositoryImpl implements UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser(array $data) : User
    {
        DB::beginTransaction();

        $usuario = $this->model->create($data);
        DB::commit();

        return $usuario;
    }

    public function updateUser(int $userId, array $data)
    {
        DB::beginTransaction();
        $usuario = $this->findUserById($userId);
        error_log(print_r($data, true));
        $usuario->update([
            'userName' => $data['userName'] ?? $usuario->userName,
            'userEmail' => $data['userEmail'] ?? $usuario->userEmail,
            'userPassword' => $data['userPassword'] ?? $usuario->userPassword,
        ]);
        DB::commit();
        return $usuario;
    }

    public function deleteUserById(int $userId)
    {
        DB::beginTransaction();
        $usuario = $this->findUserById($userId);
        $usuario->delete();
        DB::commit();
    }

    public function findUserById(int $id): User
    {
       return User::where('id', $id)->first();
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
