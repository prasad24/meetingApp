<?php

use Illuminate\Http\Request;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
// */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'/v1'], function() {
  Route::resource('meeting', 'MeetingController', [
    'except' => ['edit','create']
  ]);

  Route::resource('/meeting/registration', 'MeetingController', [
    'only' => ['store','destroy']
  ]);

  Route::post('user', [
    'uses' =>  'AuthController@store',
    'as' => 'user.store'
  ]); 

  Route::post('user/login', [
    'uses' =>  'AuthController@login',
    'as' => 'user.login'
  ]);   
});
