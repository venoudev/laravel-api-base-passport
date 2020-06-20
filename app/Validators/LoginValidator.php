<?php

namespace App\Validators;

use VenouDev\Results\Result;
use Illuminate\Support\Facades\Validator;

class LoginValidator
{

    public static function execute($data, Result $result){

        $validator=Validator::make($data,[
          'email'=> ['required', 'string', 'max:100'],
          'password'=> ['required', 'string',],

        ]);

        if ($validator->fails()) {

            $result->setCode(400);
            $result->setStatus('fail');
            $result->setErrors($validator->errors());
            $result->addMessage('[ERR_CHECK_DATA] # The form has errors whit the inputs');

            return $result;
        }

        $result->addMessage('[VALIDATED] # login inputs validated');

        return $result;


    }

}
