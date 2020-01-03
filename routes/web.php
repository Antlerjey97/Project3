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
        route::get('list', 'Api\BannerController@index');
        route::get('edit/{id}', 'Api\BannerController@getedit');
        route::post('edit/{id}', 'Api\BannerController@update');
        route::get('add', 'Api\BannerController@add');
        route::post('add', 'Api\BannerController@store');
        route::get('delete/{id}', 'Api\BannerController@destroy');
    });
    Route::group(['prefix' => 'category'], function () {
        route::get('list', 'Api\CategoryController@index');
        route::get('delete/{id}', 'Api\CategoryController@destroy');
        route::get('add', 'Api\CategoryController@add');
        route::post('add', 'Api\CategoryController@store');
        route::get('edit/{id}', 'Api\CategoryController@getedit');
        route::post('edit/{id}', 'Api\CategoryController@update');
    });
    Route::group(['prefix' => 'Product'], function () {
        route::get('list', 'Api\ProductController@index');
        route::get('edit/{id}', 'Api\ProductController@getedit');
        route::post('edit/{id}', 'Api\ProductController@update');
        route::get('delete/{id}', 'Api\ProductController@destroy');
        route::get('add', 'Api\ProductController@add');
        route::post('add', 'Api\ProductController@store');
    });
    Route::group(['prefix' => 'order'], function () {
        route::get('list', 'Api\OrderController@index');
        route::get('detail/{id}', 'Api\OrderController@show');
    });
    Route::group(['prefix' => 'inforcompany'], function () {
        route::get('list', 'Api\InforcompanyController@index');
        route::get('edit', 'Api\InforcompanyController@edit');
        route::get('add', 'Api\InforcompanyController@getthem');
    });
    Route::group(['prefix' => 'promotion'], function () {
        route::get('list', 'Api\PromotionController@index');
        route::get('edit/{id}', 'Api\PromotionController@getedit');
        route::post('edit/{id}', 'Api\PromotionController@update');
        route::get('delete/{id}', 'Api\PromotionController@destroy');
        route::get('add', 'Api\PromotionController@add');
        route::post('add', 'Api\PromotionController@store');
    });
    Route::group(['prefix' => 'PromotionNews'], function () {
        route::get('list', 'Api\PromotionNewsController@index');
        route::get('edit/{id}', 'Api\PromotionNewsController@getedit');
        route::post('edit/{id}', 'Api\PromotionNewsController@update');
        route::get('add', 'Api\PromotionNewsController@add');
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
    Route::post('loadmore', 'ProductmoreController@loadMore');
    Route::post('loadmore', 'TintucmoreController@loadMore');
    Route::post('timkiem', 'PageController@Timkiem');
    Route::post('timkiemajax', 'PageController@TimkiemAjax');
    Route::post('signUp', 'PageController@signUp');
    Route::post('createSession', 'PageController@createSession');
    Route::post('login', 'PageController@login');


});

