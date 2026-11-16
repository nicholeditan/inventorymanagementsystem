<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;

// For classroom practice only: public, unauthenticated example endpoints.
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Week 12 Laravel REST API is working',
    ]);
});

Route::apiResource('students', StudentController::class);
