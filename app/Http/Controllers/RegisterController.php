<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     * RegisterController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Register a new user.
     *
     * @param  UserRequest  $request
     * @return JsonResponse
     */
    public function register(UserRequest $request): JsonResponse
    {
        return response()->json($this->userService->createUser($request->all()));
    }
}
