<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Services\Messages;

class RegisterRepository
{
    public function create_user($data)
    {
        if (!isset($data['password'])) {
            $data['password'] = rand(0, 99999);
        }

        User::query()->create($data);

        return Messages::success([], 'User created successfully');
    }
}
