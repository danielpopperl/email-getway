<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SensediasController;
use Illuminate\Support\Facades\Route;


//JWT Routes
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});


//Sensedia Requests
Route::group([

    'middleware' => 'auth:api',
    'prefix' => 'email'

], function() {

    Route::post('send', [SensediasController::class, 'send']);

});


// Route::get('teste', [Controller::class, 'getF']);
