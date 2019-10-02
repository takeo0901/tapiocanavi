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

Auth::routes();

//トップページ
Route::get('/', function () {return view('welcome');});

//場所から探す
Route::group(['prefix' => 'prefecture'], function (){
Route::get('/', 'PrefectureController@index')->name('pref.index');
Route::get('/{id}', 'PrefectureController@show')->name('pref.show');
Route::get('/{id}/{shop_id}', 'PrefectureController@shop')->name('pref.shop');
});

//Route::get('/{shop_id}/{review_id}', 'PrefectureController@review')->name('pref.review');
Route::get('/{shop_id}/review', 'prefectureController@reviewcr')->name('review.create');
Route::post('{shop_id}/review/create', 'ReviewController@store');

//Route::resource('review', 'ReviewController');
//Route::get('review/show/{review_id}', 'ReviewController@show');
Route::get('review/edit/{review_id}', 'ReviewController@edit');
Route::post('review/update/{review_id}', 'ReviewController@update');
Route::delete('review/delete/{review_id}', 'ReviewController@delete')->name('review.delete');

Route::get('search', 'SearchController@search');

//ログインユーザー画面
Route::group(['prefix' => 'users', 'middleware' => 'auth:user'], function () {
    Route::get('show/{id}', 'UsersController@show')->name('users.show');
    Route::get('review/{id}','UsersController@index')->name('review.index');
    Route::get('review/{id}/show/{review_id}', 'ReviewController@show');
    Route::get('edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('update/{id}', 'UsersController@update')->name('users.update');
});


Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
    Route::get('shop', 'ShopController@shop');
    Route::get('shop/show/{shop_id}', 'ShopController@show');
    Route::get('shop/edit/{shop_id}', 'shopController@edit');
    
});