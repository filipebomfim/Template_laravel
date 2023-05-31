<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('jwt.auth')->group(function(){
    Route::post('me',[App\Http\Controllers\Api\AuthController::class, 'me']);
    Route::post('logout',[App\Http\Controllers\Api\AuthController::class, 'logout']);    
    Route::apiResource('permission',App\Http\Controllers\Api\PermissionController::class);
    Route::apiResource('role',App\Http\Controllers\Api\RoleController::class);
    Route::prefix('users')->group(function(){   
        Route::get('/',[App\Http\Controllers\Api\UserController::class, 'getAllUsers']);
        Route::get('getUserRoles',[App\Http\Controllers\Api\UserController::class, 'getUserRoles']);
        Route::post('givePermission',[App\Http\Controllers\Api\UserController::class, 'givePermission']);
        
    });
});

Route::post('login',[App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('refresh',[App\Http\Controllers\Api\AuthController::class, 'refresh']);


