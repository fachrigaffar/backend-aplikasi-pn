<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KunjunganController;
use App\Http\Controllers\API\AgendaController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('store', [KunjunganController::class, 'store']);
Route::apiResource('agenda', AgendaController::class);
