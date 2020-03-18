<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::post('follow/{user}', 'FollowsController@store');

// Posts routs
Route::get('/', 'PostsController@index')->name('posts.index');
Route::get('/p/create', 'PostsController@create')->name('posts.create');
Route::post('/p', 'PostsController@store')->name('posts.store');
Route::get('/p/{post}', 'PostsController@show')->name('posts.show');


// Profiles routs
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

// Message routs
Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
