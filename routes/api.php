<?php

use Illuminate\Http\Request;

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

// Route::prefix('su')->group(function(){
//     Route::post('lorem','loremController@index');
//     Route::get('/','SU\DashboardController@index');
// });


Route::group(['prefix'=>'SU','namespace'=>'SU'],function(){
    Route::get('/','SuperUserController@index');
    Route::post('/Register','SuperUserController@register');
    Route::post('/Login','SuperUserController@login');
});

// Route::get('admins','SU\SuperUSerController@index');
