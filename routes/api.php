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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('user/details', 'API\UserController@details');
    
    Route::apiResource('dashboard', 'DashboardController');
    //Route::apiResource('task', 'TaskController');
    Route::apiResource('report', 'ReportController');
    Route::apiResource('manageitem', 'ManageItemController');

    Route::get('task/usertask/{userID}', 'API\TaskController@userTask');
    Route::get('task/usertask_date/{date}', 'API\TaskController@userTask');
    Route::get('task/usertask_month/{month}', 'API\TaskController@userTask');

    Route::get('task/yearly/{date}', 'API\TaskController@yearlyTask');
    Route::get('task/monthly/{date}', 'API\TaskController@monthlyTask');
    Route::get('task/daily/{date}', 'API\TaskController@dailyTask');
});