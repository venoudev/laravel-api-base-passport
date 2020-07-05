<?php

namespace App\Validators;

use Venoudev\Results\Contracts\Result;
use Illuminate\Support\Facades\Validator;
use Venoudev\Results\Exceptions\CheckDataException;

class LoginValidator
{

    public static function execute($data){

        $validator=Validator::make($data,[
          'email'=> ['required', 'string', 'max:100','email'],
          'password'=> ['required', 'string',],

        ]);

        if ($validator->fails()) {
            $exception = new CheckDataException();
            $exception->addFieldErrors($validator->errors());
            throw $exception;
        }
    }
}
