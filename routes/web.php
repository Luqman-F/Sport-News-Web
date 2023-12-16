<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// routes/web.php
Route::get('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@register')->name('register');

Route::post('login', 'AuthController@attempt');
Route::post('register', 'AuthController@store');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('journalist', 'DashboardController@journalistHome')->name('journalist');
Route::get('journalist/posts', 'DashboardController@journalistPost')->name('journalist.posts');
Route::get('journalist/posts/create', 'DashboardController@create')->name('journalist.create');
Route::post('journalist/posts', 'DashboardController@storePost')->name('journalist.store');
Route::get('journalist/posts/{id}/edit', 'DashboardController@editPost')->name('journalist.edit');
Route::put('journalist/posts/{id}', 'DashboardController@updatePost')->name('journalist.update');
Route::delete('journalist/posts/{id}', 'DashboardController@destroyPost')->name('journalist.destroy');

Route::get('admin', 'DashboardController@adminHome')->name('admin');
Route::get('admin/post', 'DashboardController@managePost')->name('admin.post');
Route::get('admin/post/{id}/edit', 'DashboardController@edit')->name('admin.edit');
Route::put('admin/post/{id}', 'DashboardController@update')->name('admin.update');
Route::delete('admin/{id}', 'DashboardController@destroy')->name('admin.destroy');
Route::get('admin/journalist', 'DashboardController@manageJournalist')->name('admin.manage-journalist');

Route::get('/', 'PostController@index')->name('feed');
Route::get('search', 'PostController@search')->name('search');
Route::get('post/{slug}', 'PostController@show')->name('post.show');
Route::post('post/{id}', 'PostController@store')->name('comment.store');
