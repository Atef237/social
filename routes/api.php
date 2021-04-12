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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register/user','Api\userController@regiser');
Route::post('login','Api\userController@login');

route::group(['middleware' => 'auth:api','namespace'=>'Api'],function (){
    route::post('add/post','userController@Post');
    route::post('comment','userController@addCommentt');
    route::post('like','userController@addLike');
    route::post('reply','userController@addReply');
});

