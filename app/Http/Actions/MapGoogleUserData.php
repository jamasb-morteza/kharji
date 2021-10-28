<?php

namespace App\Http\Actions;

use Illuminate\Support\Facades\Hash;

class MapGoogleUserData
{
    public static function handle(\Laravel\Socialite\Contracts\User $google_user)
    {
        $user_array = $google_user->user;
        return [
            'first_name' => isset($user_array['given_name']) ? $user_array['given_name'] : null,
            'last_name' => isset($user_array['family_name']) ? $user_array['family_name'] : null,
            'nick_name' => $google_user->getNickname(),
            'name' => $google_user->getName(),
            'email' => $google_user->getEmail(),
            'google_id' => $google_user->getId(),
            'avatar' => $google_user->getAvatar(),
            'avatar_original' => $google_user->getAvatar(),
            'password' => Hash::make(config('kharji.default_password'))
        ];
    }
}
