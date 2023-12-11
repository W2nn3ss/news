<?php

namespace App\Repositories;

use App\DTO\UserDataTransferObject;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository
{
    /**
     * Add a new user.
     *
     * @param UserDataTransferObject $data
     * @return Collection
     */
    public function addUser(UserDataTransferObject $data): Collection
    {
        try
        {
            return collect(
                User::create([
                    'name' => $data->name,
                    'email' => $data->email,
                    'password' => $data->password
                ])
            );
        }
        catch (\Exception $e)
        {
            return collect(['error' => 'Fail create user', 'message' => $e->getMessage()]);
        }
    }
}
