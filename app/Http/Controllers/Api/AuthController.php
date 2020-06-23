<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contracts\AuthService;
use App\Http\Resources\UserLoginResource;

use Venoudev\Results\Contracts\Result;
use ResultManager;

use App;

class AuthController extends Controller
{
    protected $authenticationService;

    public function __construct(AuthService $authenticationService){
        $this->authenticationService = $authenticationService;
    }

    public function login(Request $request){

        $data= $request->only(['email', 'password']);

        //$this->result = new Result();
        $result= ResultManager::createResult();

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
                return $response = $this->errorResponse([],[], 500,
                    'Unhandled case, please contact with the administrator');
            break;
        }
    }


    public function logout(Request $request){

        $result = ResultManager::createResult();

        $authenticationService->logout($result);

        switch ($result->getStatus()) {
            case 'success':

                return $successResponse(
                    [],
                    $result->getMessages(),
                    200,
                    'Logout proccess complete'
                );

                break;

            case 'fail' :

                return $response= $errorResponse(
                    $result->getErrors(),
                    $result->getMessages(),
                    $result->getCode(),
                    'exist conflict whit the request, please check the errors and messages'
                );

                break;

            break;

            default:
                return $response= $errorResponse([],[], 500,
                    'Unhandled case, please contact with the administrator');
            break;
        }

    }
}
