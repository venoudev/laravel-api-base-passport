<?php

namespace App\Services;

use Venoudev\Results\Contracts\Result;

use App\Services\Contracts\AuthService;
use App\Validators\LoginValidator;
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;

class AuthServiceImpl implements AuthService{

    public function login($data, $result):Result{

        LoginValidator::execute($data, $result);

        if($result->findMessage('[CHECK_DATA]')){
           return $result;
        }

        LoginAction::execute($data, $result);


        if($result->findMessage('[FAILED_AUTH]')){
            return $result;
        }

        $result->setMessages([]);

        $result->addMessage('[LOGIN_SUCCESS] # login do correctly');

        return $result;

    }

    public function logout( $result):Result{

        LogoutAction::execute($result);

        if($result->findMessage('[LOGOUT]')==false){
            $result->setMessages([]);
            $result->setStatus('fail');
            $result->addMessage('[LOGOUT_FAIL] # logout error try again later');
            return $result;
        }

        return $result;

    }
}
