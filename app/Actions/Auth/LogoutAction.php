<?php

namespace App\Actions\Auth;


use Venoudev\Results\Result;
use Auth;

class LogoutAction{

    public static function execute($result):Result{

        $user = Auth::user();
        $user->tokens()->update(['revoked' => true]);
        $user->save();

        $result->addMessage('[LOGOUT] # Successfully logged out');
        $result->setStatus('success');
        $result->setCode(200);

        return $result;
    }


}
