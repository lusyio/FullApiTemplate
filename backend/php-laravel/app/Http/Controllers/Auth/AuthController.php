<?php

namespace App\Http\Controllers\Auth;
use App\Models\EmailVerificationToken;
use App\Models\PasswordResetToken;
use App\Models\User;
use App\Services\CreateService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use App\Helpers\Utils;
use App\Helpers\ProtocolResp;

class AuthController extends Controller
{
    public function signInByEmail(LoginRequest $request)
    {
        $validator = Validator::make($request->only('email', 'password'), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        $resp = new ProtocoLResp();

        Utils::convertErrorToProtocol($validator);

        if (!Auth::attempt($request->only('email', 'password'))) {
            $resp->msg = 'Неверные учетные данные';
            return $resp->response();
        }

        $request->session()->regenerate();

        $user = Auth::user();

        $resp->result = true;
        $resp->msg = 'Успешная аутентификация';
        $resp->user = $user->refresh();
        return $resp->response();
    }

    public function signUpByEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $resp = new ProtocoLResp();

        Utils::convertErrorToProtocol($validator);

        $validatedData = $validator->validated();

        $user = CreateService::createUser([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);


        event(new Registered($user));

        Auth::login($user);
        // connectToPusher();
        $resp->result = true;
        $resp->msg = 'Успешно зарегистрирован!';
        $resp->user = Auth::user();
        return $resp->response();
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $resp = new ProtocoLResp();

        Utils::convertErrorToProtocol($validator);

        $user = Auth::user();

        if (!$user) {
            $resp->msg = 'Ошибка аунтификации!';
            return $resp->response();
        }

        $validatedData = $validator->validated();


        if ($user instanceof \App\Models\User) {
            $user->password = Hash::make($validatedData['password']);
            $user->save();
            $resp->result = true;
            $resp->msg = 'Успешно обновлен пароль!';
            $resp->user = Auth::user();
            return $resp->response();
        }

        $resp->msg = 'Ошибка при обновлении пароля!';
        return $resp->response();
    }

    public function signOut(Request $request)
    {
        $user = Auth::user();

        $resp = new ProtocoLResp();

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $resp->result = true;
        $resp->msg = 'Успешный выход!';
        return $resp->response();
    }
}
