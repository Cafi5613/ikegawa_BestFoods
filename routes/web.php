<?php
//home 画面
Route::get('/','PostsController@index')->name('top')->middleware('auth');

Route::get('logout','PostsController@logout');

Route::resource('foods', 'PostsController', ['only' => ['create','store']]);

Route::resource('foods', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy',]]);

Auth::routes();

Route::get('image','PostsController@image');

Route::get('seach','PostsController@find');

Route::post('seach','PostsController@search');

Route::get('Home',function(){return view('foods.login_home');})->name('Home');

//Route::get('Map',function(){return view('foods.okok');})->name('Map');

Route::get('Map','PostsController@map')->name('Map');

Route::post('Map','PostsController@searchMap')->name('Map');

