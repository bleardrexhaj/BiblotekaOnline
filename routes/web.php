<?php

Auth::routes();





Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/user/create','UserController@index');	
Route::get('/user/all','UserController@showall');
Route::get('/user/delete','UserController@deleteuser');
Route::get('/', 'HomeController@home');
Route::get('/category/search', 'CategoryController@search');
Route::get('/category/add', 'CategoryController@add');
Route::get('/bibloteka', 'MapController@index');

Route::get('/category/delete', 'CategoryController@delete');
Route::get('/qysh-me', 'HowToController@index');

Route::get('/reserve', 'ReserveController@index');
Route::get('/childregister', 'ChildRegister@index');





Route::post('/user/register','UserController@register');

Route::post('/loginvalidation', 'Auth\LoginController@test')->name('loginvalidation');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test','TestController@index');

Route::resource('/book', 'BookController');

Route::resource('/author', 'AuthorController');

Route::resource('/tag', 'TagController');

Route::resource('/category', 'CategoryController');

Route::resource('/publisher', 'PublisherController');

Route::resource('/request', 'RequestController');

Route::resource('/browse', 'BrowseController');

Route::resource('/borrow', 'BorrowController');

Route::resource('/return', 'ReturnController');

Route::resource('/language', 'LanguageController');


Route::post('/user/delete','UserController@userdelete');

Route::post('/category/delete','CategoryController@destroy');

Route::post('/result', 'BrowseController@specsearch')->name('result');

Route::post('/search','BrowseController@search')->name('search');

Route::post('/savebook','UserController@saveBook')->name('savebook');

Route::post('/validate_login','UserController@saveBook')->name('validate_login');

Route::post('/childregister', 'ChildRegister@create');

//Route::post('/book', 'BookController');






//Route::get('/search',function (){

//   return "yesss";

//});





