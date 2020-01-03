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

use App\product;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dangnhap', 'Api\userController@getdangnhapadmin');
Route::post('/admin/dangnhap', 'Api\userController@postdangnhapadmin');
Route::get('/admin/logout', 'Api\userController@dangxuat');


Route::get('test', function () {
    return view('admin.layout.index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'banner'], function () {
        route::get('list', 'Api\bannerController@index');
        route::get('edit/{id}', 'Api\bannerController@getedit');
        route::post('edit/{id}', 'Api\bannerController@update');
        route::get('add', 'Api\bannerController@add');
        route::post('add', 'Api\bannerController@store');
        route::get('delete/{id}', 'Api\bannerController@destroy');
    });
    Route::group(['prefix' => 'category'], function () {
        route::get('list', 'Api\categoryController@index');
        route::get('delete/{id}', 'Api\categoryController@destroy');
        route::get('add', 'Api\categoryController@add');
        route::post('add', 'Api\categoryController@store');
        route::get('edit/{id}', 'Api\categoryController@getedit');
        route::post('edit/{id}', 'Api\categoryController@update');
    });
    Route::group(['prefix' => 'Product'], function () {
        route::get('list', 'Api\ProductController@index');
        route::get('edit/{id}', 'Api\ProductController@getedit');
        route::post('edit/{id}', 'Api\ProductController@update');
        route::get('delete/{id}', 'Api\productController@destroy');
        route::get('add', 'Api\productController@add');
        route::post('add', 'Api\productController@store');
    });
    Route::group(['prefix' => 'order'], function () {
        route::get('list', 'Api\orderController@index');
        route::get('detail/{id}', 'Api\orderController@show');
        route::get('edit', 'bannerController@getedit');
        route::get('delete', 'bannerController@getxoa');
        route::get('add', 'bannerController@getthem');
    });
    Route::group(['prefix' => 'inforcompany'], function () {
        route::get('list', 'Api\inforcompanyController@index');
        route::get('edit', 'Api\inforcompanyController@edit');
        route::get('add', 'Api\inforcompanyController@getthem');
    });
    Route::group(['prefix' => 'promotion'], function () {
        route::get('list', 'Api\promotionController@index');
        route::get('edit/{id}', 'Api\promotionController@getedit');
        route::post('edit/{id}', 'Api\promotionController@update');
        route::get('delete/{id}', 'Api\promotionController@destroy');
        route::get('add', 'Api\promotionController@add');
        route::post('add', 'Api\promotionController@store');
    });
    Route::group(['prefix' => 'promotionNews'], function () {
        route::get('list', 'Api\promotionNewsController@index');
        route::get('edit/{id}', 'Api\promotionNewsController@getedit');
        route::post('edit/{id}', 'Api\promotionNewsController@update');
        route::get('add', 'Api\promotionNewsController@add');
    });
    Route::group(['prefix' => 'user'], function () {
        route::get('list', 'Api\userController@index');
        route::get('edit', 'Api\userController@getedit');
        route::get('delete', 'Api\userController@getxoa');
        route::get('add', 'Api\userController@add');
    });
});

Route::group(['prefix' => 'pages'], function () {

    Route::get('/', 'PageController@trangchu');
    Route::get('showproduct/{id}', 'PageController@showproduct');
    Route::get('news', 'PageController@News');
    Route::get('newdetail/{id}', 'PageController@newdetail');
    Route::get('singleProduct/{id}/{a}', 'PageController@singleProduct');
    Route::get('cart', 'PageController@getcart');
    Route::get('cart', 'PageController@getcart');
    Route::post('cart', 'PageController@postcart');
    Route::post('loadmore', 'Productmore@loadMore');
    Route::post('loadmore', 'Tintucmore@loadMore');
    Route::post('timkiem', 'PageController@Timkiem');
    Route::post('timkiemajax', 'PageController@TimkiemAjax');
    Route::post('signUp', 'PageController@signUp');
    Route::post('createSession', 'PageController@createSession');
    Route::post('login', 'PageController@login');


});

