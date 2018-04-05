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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Blogs
//*****
Route::get('/blog/create', ['uses' => 'BlogController@create', 'middleware' => 'auth']);
Route::get('/blog/edit/{id}', ['uses' => 'BlogController@edit', 'middleware' => 'auth']);
Route::get('/blog/index', ['uses' => 'BlogController@index', 'middleware' => 'auth']);
Route::post('/blog/delete', ['uses' => 'BlogController@destroy', 'middleware' => 'auth']);
Route::post('/blog/update', ['uses' => 'BlogController@update', 'middleware' => 'auth']);
Route::post('/blog/store', ['uses' => 'BlogController@store', 'middleware' => 'auth']);

Route::get('/blog/{id}', 'BlogController@show');


Route::get('/About',function() {
    return view('about');
});
Route::get('/Work',function() {
    return view('work');
});
Route::get('/Contact',function() {
    return view('contact');
});

// Categories
// **********
Route::get('/category/index', ['uses' => 'CategoryController@index', 'middleware' => 'auth']);
Route::post('/category/update', ['uses' => 'CategoryController@update', 'middleware' => 'auth']);
Route::post('/category/delete', ['uses' => 'CategoryController@destroy', 'middleware' => 'auth']);
Route::post('/category/store', ['uses' => 'CategoryController@store', 'middleware' => 'auth']);
