<?php
/*
Note there are no before=>csrf filters in here - it's being handled in the BaseController
*/


/**
* Index
*/
Route::get('/', 'IndexController@getIndex');


/**
* User
* (Explicit Routing)
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


/**
* Task
* (Explicit Routing)
*/
Route::get('/task', 'TaskController@getIndex');	
Route::get('/task/completed', 'TaskController@getCompleted'); //para listado de tareas completadas
Route::get('/task/nocomplete', 'TaskController@getNoComplete'); //para listado de tareas no completas

Route::get('/task/edit/{id}', 'TaskController@getEdit');
Route::post('/task/edit', 'TaskController@postEdit');
Route::post('/task/complete', 'TaskController@postEditC'); //para completar la tarea (mediante botón), actualiza estado
Route::get('/task/create', 'TaskController@getCreate');
Route::post('/task/create', 'TaskController@postCreate');
Route::post('/task/delete', 'TaskController@postDelete');

## Ajax examples
Route::get('/task/search', 'TaskController@getSearch');
Route::post('/task/search', 'TaskController@postSearch');


/**
* Debug
* (Implicit Routing)
*/
Route::controller('debug', 'DebugController');


/**
* Type
* (Implicit RESTful Routing)
*/
Route::resource('type', 'TypeController');



















