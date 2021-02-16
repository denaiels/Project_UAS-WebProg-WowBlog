<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ArticleController@index');

//Login User
Route::get('/login','UserController@loginPage');
Route::post('/login', 'UserController@login');

//Logout User
Route::get('/logout', 'UserController@logout');

//Detail Category
Route::get('/category/{id}','CategoryController@detailCategory');

//Detail Product
Route::get('/article/{id}','ArticleController@detailArticle');

//Register User
Route::get('/register','UserController@registerPage');
Route::post('/register', 'UserController@register');

Route::group(['prefix' => 'user'], function() {
    Route::get('/', 'UserController@index');
    Route::get('create', 'UserController@create');
    Route::post('store', 'UserController@store');
    Route::group(['prefix' => '{id}'], function () {
        Route::get('edit', 'UserController@edit');
        Route::post('update', 'UserController@update');
        Route::get('destroy', 'UserController@destroy');
    });
});