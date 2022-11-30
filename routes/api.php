<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TikonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/tikon/{id}', [TikonController::class, 'show']);
// Route::get('/order', [OrderController::class], 'index');
// Route::get('/order/{id}', [OrderController::class, 'show']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/tikon', TikonController::class) -> middleware('admin');
    Route::get('/tikon', [TikonController::class, 'index']);
    Route::resource('/order', OrderController::class);
    Route::get('/order', [OrderController::class, 'index']) -> middleware('admin');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/check', function(){
        return auth()->user();
    });
});
 

