<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\AuthService;
use Venoudev\Results\Result;
use  App\Http\Resources\UserLoginResource;

class AuthController extends Controller
{
    protected $authenticationService;

    public function __construct(AuthService $authenticationService){
        $this->authenticationService = $authenticationService;
    }

    public function login(Request $request){

        $data= $request->only(['email', 'password']);;

        $result = new Result();

        $this->authenticationService->login($data, $result);

        switch ($result->getStatus()) {
            case 'success':

                return $this->successResponse(
                    UserLoginResource::make($result->getDatum('[USER]')),
                    $result->getMessages(),
                    200,
                    'Welcome Be Awesome!'
                );

                break;

            case 'fail' :

                return $response= $this->errorResponse(
                    $result->getErrors(),
                    $result->getMessages(),
                    $result->getCode(),
                    'exist conflict whit the request, please check the errors and messages'
                );

                break;

            break;

            default:
                return $response= $this->errorResponse(
                    [],
                    [],
                    500,
                    'Unhandled case, please contact with the administrator'
                );
            break;
          }


    }


    public function register(Request $request){
        $result = new Result();

        $this->authenticationService->register($request->data());
    }


    public function logout(Request $request){
        $result = new Result();

        $this->authenticationService->register($request->data());


    }
}
