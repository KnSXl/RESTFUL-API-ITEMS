<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/items', ItemController::class);
