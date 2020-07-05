<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Venoudev\Results\Contracts\Result;
use ResultManager;

use Venoudev\Results\Exceptions\CheckDataException;
use Venoudev\Results\Exceptions\NotFoundException;

use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use App\Exceptions\FailLoginException;

class Handler extends ExceptionHandler
{



    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof UnauthorizedException) {

            $result= ResultManager::createResult();

            $result->fail();
            $result->setCode(401);
            $result->addError('UNAUTHORIZED','You don\'t have permission for this action');
            $result->setDescription('this is posible because that your rol is incorrectly');
            return $result->getJsonResponse();

        }
        if ($exception instanceof NotFoundHttpException) {
            $result= ResultManager::createResult();
            $result->fail();
            $result->setCode(403);
            $result->addError('ERR_ROUTE_NOT_FOUND','Invalid route');
            $result->setDescription('this is posible because that your route is incorrectly');
            return $result->getJsonResponse();

        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            $result= ResultManager::createResult();
            $result->fail();
            $result->setCode(405);
            $result->addError('ERR_VERB_HTTP_INVALID','The verb or method http is not allowed for the server');
            $result->addMessage('ERR_CHECK_ROUTE','The route requested could be incorrectly ');
            $result->addMessage('ERR_CHECK_VERB','The verb or method http could be incorrectly, remember check the api documentation or check if your verb o method http is [GET, POST, PUT, DELETE]');
            $result->setDescription('this is posible because your method or verb http is incorrectly for the route requested');
            return $result->getJsonResponse();
        }

        if($exception instanceof CheckDataException){
            return $exception->getJsonResponse();
        }
        if($exception instanceof NotFoundException){
            return $exception->getJsonResponse();
        }

        if($exception instanceof FailLoginException){
            return $exception->getJsonResponse();
        }

        return parent::render($request, $exception);
    }
}
