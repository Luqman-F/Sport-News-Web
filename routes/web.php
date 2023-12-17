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

Route::get('journalist/posts/create', 'PostController@create')->name('journalist.create');

Route::get('admin', 'DashboardController@adminHome')->name('admin');
Route::get('admin/post', 'DashboardController@managePost')->name('admin.post');
Route::get('admin/journalist', 'DashboardController@manageJournalist')->name('admin.manage-journalist');
Route::post('admin/journalist', 'DashboardController@storeJournalist')->name('admin.store-Journalist');
Route::delete('admin/journalist/{journalist}', 'DashboardController@deleteJournalist')->name('admin.delete-journalist');

Route::get('/', 'PostController@index')->name('feed');
Route::get('search', 'PostController@search')->name('search');
Route::get('post/{slug}', 'PostController@show')->name('post.show');
Route::post('post/{post}', 'PostController@addComment')->name('comment.store');
Route::delete('post/{post}', 'PostController@destroy')->name('post.destroyPost');
Route::get('post/{post}/edit', 'PostController@edit')->name('post.edit');

