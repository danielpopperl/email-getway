<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class ApiError extends Controller
{
    public static function render($request, Exception $exception)
    {
        if ($request->wantsJson()) {   //add Accept: application/json in request
            return ApiError::handleApiException($request, $exception);
        } else {
            $retval = parent::render($request, $exception);
        }

        return $retval;
    }

    private static function handleApiException($request, Exception $exception)
    {
        // $exception = $this->prepareException($exception);

        // if ($exception instanceof \Illuminate\Http\Exceptions\HttpResponseException) {
        //     $exception = $exception->getResponse();
        // }

        // if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
        //     $exception = $this->unauthenticated($request, $exception);
        // }

        // if ($exception instanceof \Illuminate\Validation\ValidationException) {
        //     $exception = $this->convertValidationExceptionToResponse($exception, $request);
        // }

        return ApiError::customApiResponse($exception);
    }

    private static function customApiResponse($exception)
    {
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }

        $response = [];

        switch ($statusCode) {
            case 401:
                $response['message'] = 'Unauthorized';
                break;
            case 403:
                $response['message'] = 'Forbidden';
                break;
            case 404:
                $response['message'] = 'Not Found';
                break;
            case 405:
                $response['message'] = 'Method Not Allowed';
                break;
            case 422:
                $response['message'] = $exception->original['message'];
                $response['errors'] = $exception->original['errors'];
                break;
            default:
                $response['message'] = ($statusCode == 500) ? 'Whoops, looks like something went wrong' : $exception->getMessage();
                break;
        }

        if (config('app.debug')) {
            $response['trace'] = $exception->getTrace();
            $response['code'] = $exception->getCode();
        }

        $response['status'] = $statusCode;

        return response()->json($response, $statusCode);
    }
}
