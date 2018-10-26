<?php
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('book_title','BookTitleController');
	Route::resource('book','BookController');
	Route::resource('book_user','BookUserController');
	Route::resource('issue_book','IssueBookController');
});