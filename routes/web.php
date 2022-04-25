<?php

use App\Http\Controllers\LearningofferController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LearningofferController::class, 'index']);

Route::get('offers', [LearningofferController::class, 'getAllOffers']);
