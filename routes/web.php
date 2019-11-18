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

Route::get('/admin/dangnhap','Api\userController@getdangnhapadmin');
Route::post('/admin/dangnhap','Api\userController@postdangnhapadmin');
Route::get('/admin/logout','Api\userController@dangxuat');



Route::get('thu',function(){
    $product=product::find(1);
foreach($product->comment as $comment){
    echo $comment->content."<br>";

    $comt = DB::table('comment')
    ->join('products','product_id','=','comment.id')
    ->where('product_id','=',$product)
    ->select('comment.content', 'comment.id', 'comment.status','comment.time_created')
    ->get();

    echo $comt;
}



});
Route::get('test',function(){
    return view('admin.layout.index');
});

Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'banner'], function () {
            route::get('danhsach','Api\bannerController@index');
            route::get('sua/{id}','Api\bannerController@getsua');
            route::post('sua/{id}','Api\bannerController@update');
            route::get('them','Api\bannerController@add');
            route::post('them','Api\bannerController@store');
            route::get('xoa/{id}','Api\bannerController@destroy');
        });
     Route::group(['prefix' => 'category'], function () {
            route::get('danhsach','Api\categoryController@index');
            route::get('xoa/{id}','Api\categoryController@destroy');
            route::get('them','Api\categoryController@add');
            route::post('them','Api\categoryController@store');
            route::get('sua/{id}','Api\categoryController@getsua');
            route::post('sua/{id}','Api\categoryController@update');
               });
        Route::group(['prefix' => 'Product'], function () {
            route::get('danhsach','Api\ProductController@index');
            route::get('sua/{id}','Api\ProductController@getsua');
            route::post('sua/{id}','Api\ProductController@update');
            route::get('xoa/{id}','Api\productController@destroy');
            route::get('them','Api\productController@add');   
            route::post('them','Api\productController@store');            
           });
        Route::group(['prefix' => 'order'], function () {
            route::get('danhsach','Api\orderController@index');
            route::get('detail/{id}','Api\orderController@show');
            route::get('sua','bannerController@getsua');
            route::get('xoa','bannerController@getxoa');
            route::get('them','bannerController@getthem');             
         });
        Route::group(['prefix' => 'inforcompany'], function () {
            route::get('danhsach','Api\inforcompanyController@index');
            route::get('sua','Api\inforcompanyController@edit');
            route::get('xoa','Api\inforcompanyController@getxoa');
            route::get('them','Api\inforcompanyController@getthem');  
          });
        Route::group(['prefix' => 'promotion'], function () {
            route::get('danhsach','Api\promotionController@index');
            route::get('sua/{id}','Api\promotionController@getsua');
            route::post('sua/{id}','Api\promotionController@update');
            route::get('xoa/{id}','Api\promotionController@destroy');
            route::get('them','Api\promotionController@add');    
            route::post('them','Api\promotionController@store');      
         });
        Route::group(['prefix' => 'promotionNews'], function () {
            route::get('danhsach','Api\promotionNewsController@index');
            route::get('sua/{id}','Api\promotionNewsController@getsua');
            route::post('sua/{id}','Api\promotionNewsController@update');            
            route::get('xoa','Api\promotionNewsController@getxoa');
            route::get('them','Api\promotionNewsController@add');        
         });
        Route::group(['prefix' => 'user'], function () {
            route::get('danhsach','Api\userController@index');
            route::get('sua','Api\userController@getsua');
            route::get('xoa','Api\userController@getxoa');
            route::get('them','Api\userController@add');                  
         });
});

Route::get('trangchu',function(){
    return view('pages.trangchu');
});

Route::get('pages','PageController@trangchu');

Route::get('pages/showproduct/{id}','PageController@showproduct');

Route::get('pages/news','PageController@News');

Route::get('pages/newdetail/{id}','PageController@newdetail');

Route::get('pages/singleProduct/{id}/{a}','PageController@singleProduct');

Route::get('pages/loadmore','Homepage@loadMore');