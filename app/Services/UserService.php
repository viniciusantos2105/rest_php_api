<?php

namespace App\Services;

use App\Domain\Models\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;

class UserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser($userId)
    {
        $usuario = $this->userRepository->findUserById($userId);
        return $usuario;
    }

    public function createUser(UserCreateRequest $request): User
    {
        $user = [
            "userName" => $request->userName,
            "userEmail" => $request->userEmail,
            "userPassword" => $request->userPassword
        ];
        return $this->userRepository->createUser($user);
    }


    public function updateUser($userId, UserUpdateRequest $request): User
    {
        $updatedUser = [
            "userName" => $request->userName,
            "userEmail" => $request->userEmail,
            "userPassword" => $request->userPassword
        ];
        $usuario = $this->userRepository->updateUser($userId, $updatedUser);
        return $usuario;
    }

    public function deleteUserById($userId) : void
    {
        $this->userRepository->deleteUserById($userId);
    }
}
