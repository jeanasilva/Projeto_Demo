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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('ListaItens','ListaItensController')->only([
    'index', 'show', 'store', 'put','destroy'
]);

Route::group(['middleware' => ['apiJWT']], function () {
        Route::get('tasks','TasksController@index');
        Route::get('tasks/{id}','TasksController@show');
        Route::post('tasks','TasksController@store');
        Route::put('tasks/{id}','TasksController@update');
        Route::delete('tasks/{id}','TasksController@destroy');
        Route::get('auth/users','Api\\UserController@index');

});

Route::post('auth/login', 'Api\\AuthController@login');
Route::post('auth/register','Api\\AuthController@register');


