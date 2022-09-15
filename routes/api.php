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

Route::get('random', 'App\Http\Controllers\random\randomController@random');
Route::get('random/{uniq}', 'App\Http\Controllers\random\randomController@randomRetrieve');

Route::post('random', 'App\Http\Controllers\random\randomController@randomSave');

Route::put('random/{random}', 'App\Http\Controllers\random\randomController@randomEdit');

Route::delete('random/{id}', 'App\Http\Controllers\random\randomController@randomDelete');

Route::post('random', 'App\Http\Controllers\random\randomController@randomGenerate');