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

//  Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
//  });
// Route::get('supplier', 'SupplierController@getIndexApi');
// Route::post('supplier', 'SupplierController@addApi');
// Route::put('supplier', 'SupplierController@updateApi');
// Route::post('supplier', 'SupplierController@deleteApi');
//Route::get('/api/ticket', 'TicketApiController@index');

Route::post('register', 'Api\ApiRegisterController@register');
Route::post('login', 'Api\ApiLoginController@login');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('user', 'Api\ApiLoginController@getAuthenticatedUser');

    Route::get('ticket', 'Api\ApiTicketController@index');

});
