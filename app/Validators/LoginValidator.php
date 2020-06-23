<?php

namespace App\Validators;

use Venoudev\Results\Contracts\Result;
use Illuminate\Support\Facades\Validator;

class LoginValidator
{

    public static function execute($data, Result $result){

        $validator=Validator::make($data,[
          'email'=> ['required', 'string', 'max:100','email'],
          'password'=> ['required', 'string',],

        ]);

        if ($validator->fails()) {

            $result->setCode(400);
            $result->setStatus('fail');
            $result->setErrors($validator->errors());
            $result->addMessage('[CHECK_DATA] # The form has errors whit the inputs');

            return $result;
        }

        $result->addMessage('[VALIDATED] # login inputs validated');

        return $result;


    }

}
