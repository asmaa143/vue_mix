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

Route::get('/tasks',[\App\Http\Controllers\TaskController::class,'index']);


Route::prefix('/task')->group(function (){
    Route::post('/store',[\App\Http\Controllers\TaskController::class,'store']);
    Route::put('/{id}',[\App\Http\Controllers\TaskController::class,'update']);
    Route::delete('/{id}',[\App\Http\Controllers\TaskController::class,'destroy']);
});

//Route::resource('tasks',\App\Http\Controllers\TaskController::class);
