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

use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('404', 'HomeController@error');
Route::get('/post/{id}', 'HomeController@post')->name('post.show');
Route::get('/post/categories/{id}', 'HomeController@categoriesPost')->name('categoriespost.show');
Route::get('/author/{id}', 'HomeController@about')->name('about.show');
Route::post('/post/{id}', 'HomeController@comment')->name('guestcomment.store');
Route::delete('/post/{id}', 'HomeController@destroycomment')->name('guestcomment.destroy');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('', 'AdminPanelTextsController');
    Route::resource('texts', 'AdminPanelTextsController');
    Route::resource('slider', 'AdminPanelSliderController');
    Route::resource('categories', 'AdminPanelCategoriesController');
    Route::resource('messages', 'AdminPanelMessagesController');
    Route::resource('comments', 'AdminPanelCommentsController');
    Route::resource('aboutme', 'AdminPanelAboutMeController');
    Route::resource('users', 'AdminPanelUsersController')->middleware('admin');
    Route::get('texts/changeslider/{id}', 'AdminPanelTextsController@slider')->name('texts.slider');
    Route::get('slider/changeslider/{id}', 'AdminPanelSliderController@slider')->name('slider.slider');
    Route::get('texts/search/', 'AdminPanelTextsController@search')->name('texts.search');
});
Auth::routes();
