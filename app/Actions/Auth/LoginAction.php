<?php

namespace App\Actions\Auth;

use Venoudev\Results\Contracts\Result;
use App\Exceptions\FailLoginException;

use Auth;

class LoginAction{


    public static function execute($data ){

        if (Auth::attempt($data) == false) {
            $exception = FailLoginException::make();
            throw $exception;
        }

        $user = Auth::user();
        $user->save();
        $accessToken = $user->createToken('auth_token')->accessToken;
        $user->access_token = $accessToken;
        $user->roles = $user->getRoleNames()->all();

        return $user;

    }

}
