<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function(){
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function(){
    
    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);
    
    //Route::group(['middleware' => 'check-project-owner'], function(){        
        Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);        
    //});
    
    Route::group(['prefix' => 'project'], function(){
        
        Route::get('{id}/members', 'ProjectMemberController@index');
        Route::post('{id}/member', 'ProjectMemberController@store');
        Route::get('{id}/member/{memberId}', 'ProjectMemberController@isMember');
        Route::delete('{id}/member/{memberId}', 'ProjectMemberController@destroy');

        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::post('{id}/note', 'ProjectNoteController@store');
        Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
        Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');
        Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');

        Route::get('{id}/task', 'ProjectTaskController@index');
        Route::post('{id}/task', 'ProjectTaskController@store');
        Route::get('{id}/task/{taskId}', 'ProjectTaskController@show');
        Route::delete('{id}/task/{taskId}', 'ProjectTaskController@destroy');
        Route::put('{id}/task/{taskId}', 'ProjectTaskController@update');
    });
});







/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
