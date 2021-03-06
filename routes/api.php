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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    
});

// Route::post('/register', 'AuthController@register');
// Route::post('/login', 'AuthController@login');
// Route::post('/logout', 'AuthController@logout');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('proposals', 'ProposalController@index');
Route::get('categories', 'CategoryController@index');
Route::get('names', 'NamesController@index');
Route::get('names/random', 'NamesController@random');
Route::post('proposals', 'ProposalController@store');
Route::post('vote', 'ProposalController@vote')->middleware('jwt.auth');
Route::get('proposals/{id}', 'ProposalController@show');
// Route::put('proposals/{project}', 'ProposalController@markAsCompleted');
