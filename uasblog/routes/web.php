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

//Home Page
Route::get('/', 'ArticleController@index');

//Register
Route::get('/register','UserController@registerPage');
Route::post('/register', 'UserController@register');

//Login User
Route::get('/login','UserController@loginPage');
Route::post('/login', 'UserController@login');

//Logout User
Route::get('/logout', 'UserController@logout')->middleware('checkauth');

//Detail Category
Route::get('/category/{id}', 'CategoryController@detailCategory');

//Detail Article
Route::get('/article/{id}', 'ArticleController@detailArticle');

//Blog Menu
Route::get('/blogmenu', 'ArticleController@blogMenu')->middleware('checkauth', 'checkroleuser');

//Create Blog
Route::get('/createblog', 'ArticleController@createBlogPage')->middleware('checkauth', 'checkroleuser');
Route::post('/createblog', 'ArticleController@createBlog');

//Delete Blog
Route::get('/delete/{id}', 'ArticleController@deleteBlog')->middleware('checkauth', 'checkroleuser');

//Update Profile
Route::get('/updateprofile', 'UserController@updateProfilePage')->middleware('checkauth', 'checkroleuser');
Route::post('/updateprofile', 'UserController@updateProfile');

//Admin Menu
Route::get('/adminmenu', 'UserController@adminMenu')->middleware('checkauth', 'checkroleadmin');

//User Menu
Route::get('/usermenu', 'UserController@userMenu')->middleware('checkauth', 'checkroleadmin');

//Delete User
Route::get('/delete/{id}', 'UserController@deleteUser')->middleware('checkauth', 'checkroleadmin');
