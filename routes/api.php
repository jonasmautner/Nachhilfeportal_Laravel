<?php

use App\Http\Controllers\LearningofferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['api', 'auth.jwt']], function () {
//    Route::post('books', [BookController::class, 'save']);
//    Route::put('books/{isbn}', [BookController::class, 'update']);
//    Route::delete('books/{isbn}', [BookController::class, 'delete']);
//    Route::post('auth/logout', [AuthController::class, 'logout']);
//});
//
//Route::post('auth/login', [AuthController::class, 'login']);
//Route::get('books', [BookController::class, 'index']);

Route::get('offers', [LearningofferController::class, 'getAllOffers']);
Route::get('offers/{id}', [LearningofferController::class, 'getOfferById']);
Route::get('offers/check/{id}', [LearningofferController::class, 'checkOfferById']);

Route::post('offers', [LearningofferController::class, 'createOffer']);
Route::put('offers/edit/{id}', [LearningofferController::class, 'editOffer']);
Route::put('offers/accept/{id}', [LearningofferController::class, 'acceptOffer']);
Route::delete('offers/{id}', [LearningofferController::class, 'deleteOffer']);
