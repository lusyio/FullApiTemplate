<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function signInByEmail(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'result' => false,
                'msg' => 'Неверные учетные данные',
            ]);
        }

        $request->session()->regenerate();

        return response()->json([
            'result' => true,
            'msg' => 'Успешная аутентификация',
            'user' => Auth::user(),
        ]);
    }
    public function signUpByEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (!$user) {
            return response()->json([
                'result' => false,
                'msg' => 'Ошибка при регистрации пользователя.',
            ]);
        }

        event(new Registered($user));

        Auth::login($user);
        return response()->json([
            'result' => true,
            'msg' => 'Успешно зарегистрирован!',
            'user' => Auth::user(),
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', Rules\Password::defaults()],
        ]);

        $user = Auth::user();

        // Обновляем пароль пользователя
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'result' => true,
            'msg' => 'Пароль успешно обновлен!',
            'user' => $user,
        ]);
    }

    public function signOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'result' => true,
            'msg' => 'Успешный выход',
        ]);
    }
}
