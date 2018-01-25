<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Illuminate\Validation\ValidationException as ValidationException;
use Illuminate\Auth\AuthenticationException as AuthenticationException;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // Json error exceptions
        if ($request->wantsJson())
        {
            // This will replace our 404 response with a JSON response.
            if ($exception instanceof ModelNotFoundException)
            {
                return response()->json([
                    'code' => 404,
                    'message' => 'Resource not found.'
                ], 404);
            }
            // This will replace our 404 response with a JSON response.
            if ($exception instanceof ValidationException)
            {
                //dd($exception);
                return response()->json([
                    'code' => $exception->status,
                    'message' => 'The given data was invalid.',
                    'errors' => $exception->errors(),
                ],  $exception->status);
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\ValidationException  $exception
     * @return \Illuminate\Http\Response
     */
    /*
     protected function convertValidationExceptionToResponse($request, ValidationException $exception)
    {
        $response = parent::convertValidationExceptionToResponse($exception, $request);
        if ($response instanceof JsonResponse) {
            $original = $response->getOriginalContent();
            $original['message'] = __($original['message']);
            $response->setContent(json_encode($original));
        }
        return $response;
    }
    */

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // This will replace our 404 response with
        // a JSON response.
        $code = 401;
        if ($request->wantsJson())
        {
            return response()->json(['code' => $code , 'message' => 'Unauthenticated error.'], $code);
        } 
        else
        {
            return response()->view('error', ['error' => 'Unauthenticated', 'code' => $code], $code);
        }
    }

}
