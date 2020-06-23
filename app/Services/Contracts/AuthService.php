<?php

namespace App\Services\Contracts;

use Venoudev\Results\Contracts\Result;

interface AuthService {

    public function login($data, Result $result):Result;

    public function logout(Result $result):Result;

}
