<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', 'AuthController@login')->name('login');
Route::get('register', 'AuthController@register')->name('register');

Route::post('login', 'AuthController@attempt');
Route::post('register', 'AuthController@store');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('journalist', 'DashboardController@journalistHome')->name('journalist');
Route::get('journalist/create', 'DashboardController@create')->name('journalist.create');
Route::post('journalist', 'DashboardController@store')->name('journalist.store');
Route::get('journalist/{id}/edit', 'DashboardController@edit')->name('journalist.edit');
Route::put('journalist/{id}', 'DashboardController@update')->name('journalist.update');
Route::delete('journalist/{id}', 'DashboardController@destroy')->name('journalist.destroy');

Route::get('admin', 'DashboardController@adminHome')->name('admin');
Route::get('admin/create', 'DashboardController@create')->name('admin.create');
Route::get('admin/post/{id}/edit', 'DashboardController@edit')->name('admin.edit');
Route::put('admin/post/{id}', 'DashboardController@update')->name('admin.update');
Route::delete('admin/{id}', 'DashboardController@destroy')->name('admin.destroy');

Route::get('feed', 'PostController@index')->name('feed');
Route::get('search', 'PostController@search')->name('feed.search');
Route::get('post/{id}', 'PostController@show')->name('post.show');
Route::post('post/{id}', 'PostController@store')->name('comment.store');
