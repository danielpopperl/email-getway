<?php

namespace App\Exceptions;

use Closure;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (UnauthorizedHttpException $e, $request) {
            if ($request->is('api/*')){

                return response()->json(['message' => 'Not Authorized'], 401);
            }
        });

        $this->renderable(function (UnauthorizedException $e, $request) {
            if ($request->is('api/*')){

                return response()->json(['message' => 'Not Authorized'], 401);
            }
        });

        $this->renderable(function (HttpResponseException $e, $request) {
            if ($request->is('api/*')){

                return response()->json(['message' => 'Not Authorized'], 401);
            }
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')){

                return response()->json(['message' => 'Not Authorized'], 401);
            }
        });

        // $this->renderable(function (Throwable $e, $request) {
        //     if( $request->is('api/*')){
        //         if ($e instanceof UnauthorizedHttpException) {
        //       return response()->json([
        //                  'error' => 'Model not found'
        //              ], 404);
        //                  }
        //        if ($e instanceof UnauthorizedException) {
        //       return response()->json([
        //                  'error' => 'Resource not found'
        //              ], 404);
                             
        //                  }
        //      }
        // });
        
    }

}
