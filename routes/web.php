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

Route::get('/', function () {
    return redirect(route('blog.index'));
});

Route::resource('blog', 'BlogController');

//Route::view('edit', 'form.edit');

//Route::view('/blog/create', 'form.create')->name('blog.create');

//Route::view('create');

//Route::get('/dashboard', 'BlogController@index');
