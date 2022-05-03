<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LearningofferController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index']);

Route::get('offers', [LearningofferController::class, 'getAllOffers']);
