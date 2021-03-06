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


Route::get('/', function () {
    return response()->json(['message' => 'Reica API', 'status' => 'Connected']);
});
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('user', 'AuthController@user')->middleware('auth:sanctum');


Route::resource('projects', 'ProjectController')->middleware('auth:sanctum');
Route::resource('properties', 'PropertyController')->middleware('auth:sanctum');
