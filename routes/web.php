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
Route::post('search-profile', 'FrontendController@searchProfile');
Route::post('search-profile', 'FrontendController@searchProfile');
Route::post('save-contact', 'FrontendController@save_contact');
Route::post('save-feedback', 'FrontendController@save_feedback');
Route::post('check-login', 'UserController@check_login');
Route::get('logout', 'UserController@logout');
Route::get('search-partner', 'FrontendController@search_partner');
Route::post('search-partner-list', 'FrontendController@search_partner_list');
Route::post('search-partner-new', 'FrontendController@search_partner_new');
Route::get('edit-profile/{id}', 'UserController@edit_profile');
Route::post('update-profile', 'UserController@update_profile');
Route::post('update-family-details', 'UserController@update_family_details');
Route::post('update-partner-preference', 'UserController@update_partner_preference');
Route::post('update-photo', 'UserController@update_photo');
Route::post('update-password', 'UserController@update_password');
Route::get('delete-user-image', 'UserController@delete_user_image');


//// Admin Routes
Route::get('matrimony-admin', 'AdminController@login');
Route::post('admin-login-check', 'AdminController@login_check');
Route::get('dashboard', 'AdminController@dashboard');
Route::get('admin-logout', 'AdminController@admin_logout');
/*-------- User Controller -----------------*/
Route::get('add-user', 'AdminUserController@addUser');
Route::post('save-user', 'AdminUserController@saveUser');
Route::get('manage-user', 'AdminUserController@manageUser');
Route::get('unpublish-user-status/{id}', 'AdminUserController@unpublishUser');
Route::get('publish-user-status/{id}', 'AdminUserController@publishUser');
Route::get('delete-user/{id}', 'AdminUserController@deleteUser');
Route::get('edit-user/{id}', 'AdminUserController@editUser');
Route::get('change-user-info', 'AdminUserController@changeUserInfo');
Route::post('update-user', 'AdminUserController@updateUser');
//////// UserRequest Controller
Route::get('user-request', 'UserRequestController@user_request');
Route::get('approve-user-request/{id}', 'UserRequestController@user_request_approve');