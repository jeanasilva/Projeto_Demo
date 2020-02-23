<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;

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

Route::apiResource('ListaItens','ListaItensController')->only([
    'index', 'show', 'store', 'put','destroy'
]);

Route::group(['middleware' => ['apiJWT']], function () {
    Route::get('users','Api\\UserController@index');
    Route::apiResource('tasks','TasksController')->only([
        'index', 'show', 'store','put','update','destroy','delete'
    ]);
});

Route::post('auth/login', 'Api\\AuthController@login');

