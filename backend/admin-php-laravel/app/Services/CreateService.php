<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserNotificationsSettings;
use Illuminate\Support\Facades\Hash;

class CreateService
{
    public static function createUser(array $userData)
    {
        // Создаем пользователя
        $user = User::create([
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ]);

        return $user;
    }
}
