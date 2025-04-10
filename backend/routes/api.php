<?php

use App\Http\Controllers\KategoriakController;
use App\Http\Controllers\TevekenysegekController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/tevekenysegek',[TevekenysegekController::class, 'index']);
Route::get('/kategoriak',[KategoriakController::class, 'index']);

Route::get('/tevekenysegek/kategoria/{id}',[TevekenysegekController::class, 'specificKat']);
Route::post('/tevekenyseg',[TevekenysegekController::class, 'tevekenysegFeltolt']);
Route::delete('/tevekenyseg/{id}',[TevekenysegekController::class, 'tevekenysegTorol']);



