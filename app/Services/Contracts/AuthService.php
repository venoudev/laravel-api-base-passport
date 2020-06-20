<?php

namespace App\Services\Contracts;

use Venoudev\Results\Result;

interface AuthService {

    public function login($data, Result $result):Result;

    public function register($data, Result $result):Result;

    public function logout($data, Result $result):Result;

}
