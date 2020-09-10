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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::any('/brand/create', 'Admin\BrandController@create')->name("brand.create");
Route::any('/brand/store', 'Admin\BrandController@store');
Route::any('/brand/index', 'Admin\BrandController@index')->name("brand.index");
Route::any('/brand/uploads', 'Admin\BrandController@uploads');
Route::any('/brand/edit/{id}', 'Admin\BrandController@edit')->name("brand.edit");
Route::any('/brand/update/{id}', 'Admin\BrandController@update');
Route::any('/brand/ajaxjdjd', 'Admin\BrandController@ajaxjdjd');
Route::any('/brand/destroy', 'Admin\BrandController@destroy');
Route::any('/brand/del', 'Admin\BrandController@del');
Route::any('/brand/ajaxpage', 'Admin\BrandController@ajaxpage');

