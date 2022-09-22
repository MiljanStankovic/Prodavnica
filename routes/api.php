<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProizvodController;
use App\Http\Controllers\ProizvodjacController;
use App\Http\Controllers\ProizvodjacProizvodController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\TipProizvodController;
use App\Http\Controllers\API\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('tipovi', TipController::class);
Route::resource('proizvodjaci', ProizvodjacController::class);
Route::resource('proizvodi', ProizvodController::class);

Route::resource('tip.proizvod', TipProizvodController::class)->only(['index']);
Route::resource('proizvodjac.proizvod', ProizvodjacProizvodController::class)->only(['index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::resource('proizvodi', ProizvodController::class)->only(['update', 'store', 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



