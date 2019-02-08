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
Route::get('profile/{id}', 'UserController@profileById');
Route::post('save-contact', 'FrontendController@save_contact');
Route::post('save-feedback', 'FrontendController@save_feedback');
Route::post('check-login', 'UserController@check_login');
Route::get('logout', 'UserController@logout');
Route::get('search-partner', 'FrontendController@search_partner');
Route::get('edit-profile/{id}', 'UserController@edit_profile');
Route::post('update-profile', 'UserController@update_profile');
Route::post('update-family-details', 'UserController@update_family_details');
Route::post('update-partner-preference', 'UserController@update_partner_preference');
Route::post('update-photo', 'UserController@update_photo');
