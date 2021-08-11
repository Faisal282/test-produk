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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('produk')->group(function () {
    Route::get('getall', 'PelangganController@getAll');
    Route::get('detail/{id}', 'PelangganController@getDetail');
    Route::post('insert', 'PelangganController@insert');
    Route::post('delete/{id}', 'PelangganController@delete');
    Route::post('update/{id}', 'PelangganController@update');
});
