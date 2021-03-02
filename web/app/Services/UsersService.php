<?php

namespace App\Services;

use App\Models\User;

class UsersService extends BaseService
{
    public static function validateLogin ($data = []) : ?object
    {
        $email = $data['email'];
        $password = $data['password'];
        $user = User::where([
            'use_email' => $email,
            'use_password' => $password,
            'use_active' => '1'
        ])->get();

        if(!$user->isEmpty()) {
            return $user;
//            return redirect()->intended('dashboard');
        } else {
            return null;
//            $message_bag-> add('loginFail', 'Usuário ou Senha incorretos!');
//            return redirect()->route('auth.login')->withErrors($message_bag);
        }
    }
}
