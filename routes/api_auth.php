<?php

use App\Http\Controllers\Api\V1\User\Auth\AuthController;
use App\Http\Controllers\Api\V1\User\ProfileController;
use Illuminate\Support\Facades\Route;



Route::controller(AuthController::class)->group(function () {
    Route::post('send-sms-code', 'sendSmsCode');
    Route::post('send-email-code', 'sendEmailCode');
    Route::post('verify-sms-code', 'verifySmsCode');
    Route::post('verify-email-code', 'verifyEmailCode');
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('forget-password', 'forgetPassword');
    Route::post('verify-password-code', 'verifyPasswordCode');
    Route::post('reset-password', 'resetPassword');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('test',function(){
        dd('test');
    });
    Route::controller(ProfileController::class)->group(function () {
        Route::post('update-info', 'updateInformation');
        Route::post('update-password', 'updatePassword');
    });
});

