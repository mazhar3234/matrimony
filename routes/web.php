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

Route::get('/', 'FrontendController@index');
Route::get('register', 'UserController@register');
Route::get('login', 'UserController@login');
Route::post('register-user', 'UserController@registerUser');
Route::get('contact-us', 'FrontendController@contact');
Route::get('profile', 'FrontendController@profile');
Route::post('save-contact', 'FrontendController@save_contact');
Route::post('save-feedback', 'FrontendController@save_feedback');
Route::post('check-login', 'UserController@check_login');
Route::get('logout', 'UserController@logout');
Route::get('search-partner', 'FrontendController@search_partner');
