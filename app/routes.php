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
* Book
* (Explicit Routing)

Route::get('/book', 'BookController@getIndex');
Route::get('/book/edit/{id}', 'BookController@getEdit');
Route::post('/book/edit', 'BookController@postEdit');
Route::get('/book/create', 'BookController@getCreate');
Route::post('/book/create', 'BookController@postCreate');
Route::post('/book/delete', 'BookController@postDelete');

## Ajax examples
Route::get('/book/search', 'BookController@getSearch');
Route::post('/book/search', 'BookController@postSearch');*/


/**
* Debug
* (Implicit Routing)
*/
Route::controller('debug', 'DebugController');


/**
* Tag
* (Implicit RESTful Routing)
*/
Route::resource('tag', 'TagController');


/**
* Demos
* (Explicit Routing)
*/
Route::get('/demo/csrf-example', 'DemoController@csrf');
Route::get('/demo/collections', 'DemoController@collections');
Route::get('/demo/js-vars', 'DemoController@jsVars');

Route::get('/demo/crud-create', 'DemoController@crudCreate');
Route::get('/demo/crud-read', 'DemoController@crudRead');
Route::get('/demo/crud-update', 'DemoController@crudUpdate');
Route::get('/demo/crud-delete', 'DemoController@crudDelete');

Route::get('/demo/collections', 'DemoController@collections');
Route::get('/demo/query-without-constraints', 'DemoController@queryWithoutConstraints');
Route::get('/demo/query-with-constraints', 'DemoController@queryWithConstraints');
Route::get('/demo/query-responsibility', 'DemoController@queryResponsibility');
Route::get('/demo/query-with-order', 'DemoController@queryWithOrder');

Route::get('/demo/query-relationships-author', 'DemoController@queryRelationshipsAuthor');
Route::get('/demo/query-relationships-tags', 'DemoController@queryRelationshipstags');
Route::get('/demo/query-eager-loading-authors', 'DemoController@queryEagerLoadingAuthors');
Route::get('/demo/query-eager-loading-tags-and-authors', 'DemoController@queryEagerLoadingTagsAndAuthors');

Route::get('/demo/simple-ajax', 'DemoController@getSimpleAjax');
Route::post('/demo/simple-ajax', 'DemoController@postSimpleAjax');




















