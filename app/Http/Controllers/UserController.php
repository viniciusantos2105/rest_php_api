<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function createUser(UserCreateRequest $request): JsonResponse {
        $request->validated();
        $user = $this->userService->createUser($request);
        return response()->json($user, 201);
    }

    public function updateUser($userId, UserUpdateRequest $request): JsonResponse
    {
        $user = $this->userService->updateUser($userId, $request);
        return response()->json($user, 200);
    }

    public function getUser($userId) : JsonResponse
    {
        $user = $this->userService->getUser($userId);
        return response()->json($user, 200);
    }

    public function deleteUser($userId): JsonResponse
    {
        $this->userService->deleteUserById($userId);
        return response()->json(null, 204);
    }
}
