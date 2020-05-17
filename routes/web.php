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

Route::get('/','WebController@index');

Route::get('/all_reviews', 'WebController@all_reviews');

Route::get('/login/{type}','WebController@login');
Route::get('member/add_review/{id}', 'WebController@add_review');
Route::post('member/store_review', 'WebController@store_review');

Auth::routes();
Route::get('admin/dashboard', 'Admin\AdminController@admin_dashboard');
Route::get('admin/view_shops', 'Admin\AdminController@view_shops');
Route::get('admin/view_reviews', 'Admin\AdminController@view_reviews');
// Route::get('/home','Admin\AdminController@admin_dashboard');

//members routes
Route::get('member/dashboard', 'HomeController@member_dashboard');
Route::get('owner/dashboard', 'HomeController@owner_dashboard');
Route::get('member/view_shops/{id}', 'HomeController@member_view_shops');
Route::get('member/view_reviews/{id}', 'HomeController@member_view_reviews');
Route::post('member/store_shop_info', 'HomeController@store_shop_info');
Route::post('member/update_shop_info', 'HomeController@update_shop_info');
Route::post('member/delete_shop_info', 'HomeController@delete_shop_info');
Route::post('member/delete_review', 'HomeController@delete_review');
Route::post('member/approve_link', 'HomeController@approve_link_review');

// users routes

Route::get('admin/view_users', 'Admin\AdminController@view_users');
Route::post('admin/store_user_info', 'Admin\AdminController@store_user_info');
Route::post('admin/update_user_info', 'Admin\AdminController@update_user_info');
Route::get('admin/show_user_info/{id}', 'Admin\AdminController@show_user_info');
Route::post('admin/delete_user_info', 'Admin\AdminController@delete_user_info');


// memberships routes
