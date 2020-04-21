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

Route::get('/infophp', function () {
    return phpinfo();
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/hola/{numero?}', function ($numero) {
//     return 'Hola: '.$numero;
// })->where('numero', '[0-9]+');

//Route::view('vista','hola', ['numero' => 125]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/{num?}', 'HomeController@otro');

Route::get('/posts', [ 'as' => 'posts', 'uses' => 'PostController@index'])->middleware('auth');

Route::put('/post/store', [ 'as' => 'post.store', 'uses' => 'PostController@store'])->middleware('auth');

Route::get('/post/new', [ 'as' => 'post.new', 'uses' => 'PostController@create'])->middleware('auth');

Route::get('/post/edit', [ 'as' => 'post.edit', 'uses' => 'PostController@edit'])->middleware('auth');

Route::post('/post/update', [ 'as' => 'post.update', 'uses' => 'PostController@update'])->middleware('auth');

Route::get('/post/destroy', [ 'as' => 'post.destroy', 'uses' => 'PostController@destroy'])->middleware('auth');
