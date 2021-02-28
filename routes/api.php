<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPIController;
use App\Http\Controllers\deviceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('search/{name}',[deviceController::class,'search']);
    Route::get('list/{id?}',[deviceController::class, 'list']);
    Route::post('add',[deviceController::class, 'add']);
    Route::put('update',[deviceController::class, 'update']);
    Route::delete('delete/{id}',[deviceController::class,'delete']);
    Route::post('save',[deviceController::class,'testData']);

});
Route::get('data',[dummyAPIController::class,'getData']);

//resource routes
//Route::apiResource("member",MemberController::class);
Route::post("upload",[FileController::class,'upload']);


Route::post('login',[UserController::class,'index']);