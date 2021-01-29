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
//Backend Laravel
// Route::get('/', function () {
//     return view('welcome');
// });

//Backend route
//Login Laravel
Route::get('/', function() {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'dashboard',
], function (){
    Route::get('/', 'HomeController@index')->name('dashboard'); // prefix is url ,name is  name route
});

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'item',  //For Url
], function (){
    Route::get('/', 'ItemController@index')->name('item'); // prefix is url ,name is  name route

    Route::get('create', 'ItemController@create')->name('item.create');
    Route::post('save', 'ItemController@save')->name('item.save');
    Route::get('edit/{id}', 'ItemController@edit')->name('item.edit');
    Route::post('update', 'ItemController@update')->name('item.update');
    Route::get('delete/{id}', 'ItemController@destroy')->name('item.delete');
});

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'client',  //For Url
], function (){
    Route::get('/', 'ClientController@index')->name('client'); 
    
    Route::get('create', 'ClientController@create')->name('client.create');
    Route::post('save', 'ClientController@save')->name('client.save');
    Route::get('edit/{id}', 'ClientController@edit')->name('client.edit');
    Route::post('update', 'ClientController@update')->name('client.update');
    Route::get('delete/{id}', 'ClientController@destroy')->name('client.delete');

});

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'order',  //For Url
], function (){
    Route::get('/', 'OrderController@index')->name('order'); 
    
    Route::get('create', 'OrderController@create')->name('order.create');
    Route::post('save', 'OrderController@save')->name('order.save');
    Route::get('edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::post('update', 'OrderController@update')->name('order.update');
    Route::get('delete/{id}', 'OrderController@destroy')->name('order.delete');
    Route::get('/search','OrderController@search')->name('order.search');
});

Route::group([
  'namespace' => 'Backend',
  'prefix' => 'report',  //For Url
], function (){
    Route::get('/daterange','ReportController@daterange')->name('report.daterange');
});

// Route::get('/item','ItemController@index')->name('admin.item');
