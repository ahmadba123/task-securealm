<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userControllers;
use App\Http\Controllers\certificatesControllers;


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

// users
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [userControllers::class, 'getAll']);
    Route::get('/{id}', [userControllers::class, 'getOne']);

    Route::post('/', [userControllers::class, 'create']);
    Route::delete('/{id}', [userControllers::class, 'delete']);
    Route::put('/edit/{id}', [userControllers::class, 'editUser']);
});
Route::post('/login', [userControllers::class, 'login']);
Route::get('/logout', [userControllers::class, 'logout']);

// certificates
Route::group(['prefix' => 'certificates'], function () {
    Route::get('/', [certificatesControllers::class, 'getAll']);
    Route::post('/', [certificatesControllers::class, 'create']);
    Route::delete('/{id}', [certificatesControllers::class, 'delete']);
});
