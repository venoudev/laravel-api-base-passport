<?php

namespace App\Actions\Auth;

use Venoudev\Results\Contracts\Result;

use Auth;

class LoginAction{


    public static function execute($data, Result $result):Result{

        if (!Auth::attempt($data)) {

            $result->addMessage('[FAILED_AUTH] # Invalid login credential');
            $result->setStatus('fail');
            $result->setCode(401);

            return $result;
        }

        $user = Auth::user();
        $user->save();

        $accessToken = $user->createToken('auth_token')->accessToken;
        $user->access_token = $accessToken;
        $user->roles = $user->getRoleNames()->all();

        $result->setCode(200);
        $result->setStatus('success');
        $result->addDatum('[USER]', $user);
        $result->addMessage('[AUTHENTIFIED] # User authentified correctly');

        return $result;

    }

}
