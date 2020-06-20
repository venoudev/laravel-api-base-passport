<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Venoudev\Results\Result;
use Venoudev\Results\Traits\ApiResponser;

class Handler extends ExceptionHandler
{

    use ApiResponser;
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
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {

            $result= New Result();

            $result->addError('[You don\'t have permission for this action ] # [] # Invalid route');
            $result->setStatus('FAIL');
            $result->setCode(403);

            return $this->errorResponse(
              $result->getErrors(),
              $result->getMessages(),
              $result->getCode(),
              'this is posible because that your rol is incorrectly'
            );
        }
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            $result= New Result();

            $result->addError('[ERR_ROUTE_NOT_FOUND] # [] # Invalid route');
            $result->setStatus('FAIL');
            $result->setCode(404);

            return $this->errorResponse(
              $result->getErrors(),
              $result->getMessages(),
              $result->getCode(),
              'this is posible because that your route is incorrectly'
            );
          }
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            $result= New Result();

            $result->addError('[ERR_VERB_HTTP_INVALID] # [] # The verb or method http is not allowed for the server');
            $result->addMessage('[ERR_CHECK_ROUTE] # The route requested could be incorrectly ');
            $result->addMessage('[ERR_CHECK_VERB] # The verb or method http could be incorrectly, remember check the api documentation or check if your verb o method http is [GET, POST, PUT, DELETE]');
            $result->setStatus('FAIL');
            $result->setCode(405);

            return $this->errorResponse(
            $result->getAllError(),
            $result->getAllMessage(),
            $result->getCode(),
            'this is posible because your method or verb http is incorrectly for the route requested'
            );

        }
        return parent::render($request, $exception);
    }
}
