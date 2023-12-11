<?php

namespace App\Services;

use App\DTO\UserDataTransferObject;
use App\Repositories\UserRepository;
use Illuminate\Support\Collection;

class UserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UserService constructor.
     *
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Create a new user.
     *
     * @param  array  $data
     * @return Collection
     */
    public function createUser(array $data): Collection
    {
        return $this->userRepository->addUser($this->dto($data));
    }

    /**
     * Convert data array to UserDataTransferObject.
     *
     * @param  array  $data
     * @return UserDataTransferObject
     */
    protected function dto(array $data): UserDataTransferObject
    {
        return new UserDataTransferObject($data['name'], $data['email'], $data['password']);
    }
}
