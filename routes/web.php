<?php

Route::get('/sms','smscontroller@sendsms');
Route::post('/sms','smscontroller@sendsms');

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
/*frontend start*/

Route::get('/','publicController@index')->name('index');
Route::get('/post/{id}','publicController@singlePost')->name('singlePost');
Route::post('/post/{id}','publicController@singlePost')->name('singlePost');
Route::get('/about','publicController@about')->name('about');
Route::get('/contact','publicController@contact')->name('contact');
Route::post('/contact','publicController@contactPost')->name('contactPost');

/*frontend end*/


/*Auth start*/

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

/*Auth end*/

/*Admin start*/

Route::prefix('admin')->group(function(){
	Route::get('/dashboard', 'adminController@dashboard')->name('adminDashboard');
	Route::get('comments', 'adminController@comments')->name('adminComments');
	Route::get('posts', 'adminController@posts')->name('adminPosts');
	Route::get('users', 'adminController@users')->name('adminUsers');
});

/*Admin end*/

/*User start*/

Route::prefix('user')->group(function(){
	Route::get('dashboard', 'userController@dashboard')->name('userDashboard');
	Route::get('comments', 'userController@comments')->name('usercomments');
	Route::get('profile', 'userController@profile')->name('userprofile');
	Route::post('profile', 'userController@profilePost')->name('profilePost');
});	


/*User end*/
/*author start*/

Route::prefix('author')->group(function(){
	Route::get('dashboard', 'authorController@dashboard')->name('authordashboard');
	Route::get('comments', 'authorController@comments')->name('authorcomments');
	Route::get('posts', 'authorController@posts')->name('authorPosts');
});	
/*author end*/