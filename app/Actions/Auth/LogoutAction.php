<?php

namespace App\Actions\Auth;

use Auth;

class LogoutAction{

    public static function execute(){

        $user = Auth::user();
        $user->tokens()->update(['revoked' => true]);
        $user->save();

        return;
    }


}
