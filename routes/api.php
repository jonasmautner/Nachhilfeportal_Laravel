<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LearningofferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api', 'auth.jwt']], function () {
    Route::post('offers', [LearningofferController::class, 'createOffer']);
    Route::put('offers/{id}', [LearningofferController::class, 'updateOffer']);
    Route::put('offers/accept/{id}', [LearningofferController::class, 'acceptOffer']);
    Route::delete('offers/{id}', [LearningofferController::class, 'deleteOffer']);
    Route::post('auth/logout', [AuthController::class, 'logout']);
});

Route::get('user/{id}', [LearningofferController::class, 'getUserById']);

Route::post('auth/login', [AuthController::class, 'login']);
Route::get('subjects', [LearningofferController::class, 'getAllSubjects']);
Route::get('offers', [LearningofferController::class, 'getAllOffers']);
Route::get('offers/{id}', [LearningofferController::class, 'getOfferById']);
Route::get('offers/check/{id}', [LearningofferController::class, 'checkOfferById']);
