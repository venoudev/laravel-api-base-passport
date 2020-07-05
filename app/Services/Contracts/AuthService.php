<?php

namespace App\Services\Contracts;

interface AuthService {

    public function login($data);

    public function logout();

}
