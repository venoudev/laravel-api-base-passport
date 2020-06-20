<?php

namespace App\Services;

use App\Services\Contracts\AuthService;
use Venoudev\Results\Result;
use App\Validators\LoginValidator;
use App\Actions\Auth\LoginAction;

class AuthServiceImpl implements AuthService{

    public function login($data, $result):Result{

        LoginValidator::execute($data, $result);

        if($result->findMessage('[ERR_CHECK_DATA]')){
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

    public function register($data, $result):Result{

    }

    public function logout($data, $result):Result{

    }
}
